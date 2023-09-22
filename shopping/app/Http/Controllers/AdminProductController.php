<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Http\Requests\ProductAddRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Tag;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use Exception;
use Faker\Core\File;
use FFI;
use Illuminate\Http\Request;
use Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\TryCatch;

class AdminProductController extends Controller
{
    use StorageImageTrait, DeleteModelTrait;
    private $category;
    private $product;
    private $productImage;
    private $tag;
    private $productTag;
    public function __construct(
        Category $category,
        Product $product,
        ProductImage $productImage,
        Tag $tag,
        ProductTag $productTag
    ) {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->tag = $tag;
        $this->productTag = $productTag;
    }
    public function index()
    {
        $products = $this->product->latest()->paginate(3);
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $htmlOption = $this->getCategory("");
        return view('admin.product.add', compact('htmlOption'));
    }

    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }

    public function store(ProductAddRequest $request)
    {
        try {
            //TURN ON `TRANSACTION`
            DB::beginTransaction();
            //INSERT DATA INTO products TABLE
            $dataProductCreate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->content,
                'category_id' => $request->category_id,
                'user_id' => auth()->id()
            ];

            //get information of file
            $dataUploadFeatureImage = $this->storageTraitUpload($request, "feature_image_path", "product");
            if (!empty($dataUploadFeatureImage)) {
                $dataProductCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            //Insert data into `product` table
            $product = $this->product->create($dataProductCreate);

            //INSERT DATA INTO `product_images` table (insert detail image for product)
            if ($request->hasFile('image_path')) {
                foreach ($request->image_path as $fileItem) {
                    //get information of file
                    $dataProductImageDetail = $this->storageTraitUploadMutilple($fileItem, 'product');

                    //use productImages method defined in Product Model(now, dont need 'product_id' property in product_images Model)
                    $product->productImages()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name']
                    ]);
                }
            }

            //Insert data into `tag` table
            foreach ($request->tags as $tagItem) {
                $tagInstance = $this->tag->firstOrCreate([
                    'name' => $tagItem
                ]);
                $tagsId[] = $tagInstance["id"];
            }
            //Insert data into `product_tags` table
            $product->tags()->attach($tagsId);
            //COMMIT WITHOUT ANY ERROR
            DB::commit();

            return redirect()->route('products.index');
        } catch (Exception $exception) {
            //ROLLBACK IF HAVE ANY ERROR
            DB::rollBack();
            Log::error("Message: " . $exception->getMessage() . ", Line: " . $exception->getLine());
        }
    }

    public function edit($id)
    {
        $product = $this->product->find($id);
        $htmlOption = $this->getCategory($product->category_id);
        return view("admin.product.edit", compact('product', 'htmlOption'));
    }

    public function update(ProductAddRequest $request, $id)
    {
        try {
            //TURN ON `TRANSACTION`
            DB::beginTransaction();
            //UPDATE DATA INTO products TABLE
            $dataProductUpdate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->content,
                'category_id' => $request->category_id,
                'user_id' => auth()->id(),
            ];
            //get information of file
            $dataUploadFeatureImage = $this->storageTraitUpload($request, "feature_image_path", "product");
            if (!empty($dataUploadFeatureImage)) {
                $dataProductUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            //update data into `product` table
            $this->product->find($id)->update($dataProductUpdate);
            $product = $this->product->find($id);

            //UPDATE DATA INTO `product_images` table (update detail image for product)
            if ($request->hasFile('image_path')) {
                //delete product_id before update new data
                $this->productImage->where("product_id", $id)->delete();
                foreach ($request->image_path as $fileItem) {
                    //get information of file
                    $dataProductImageDetail = $this->storageTraitUploadMutilple($fileItem, 'product');

                    //use productImages method defined in Product Model(now, dont need 'product_id' property in product_images Model)
                    $product->productImages()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name']
                    ]);
                }
            }

            //Update data into `tag` table
            foreach ($request->tags as $tagItem) {
                $tagInstance = $this->tag->firstOrCreate([
                    'name' => $tagItem
                ]);
                $tagsId[] = $tagInstance["id"];
            }
            //Insert data into `product_tags` table
            $product->tags()->sync($tagsId);
            //COMMIT WITHOUT ANY ERROR
            DB::commit();

            return redirect()->route('products.index');
        } catch (Exception $exception) {
            //ROLLBACK IF HAVE ANY ERROR
            DB::rollBack();
            Log::error("Message: " . $exception->getMessage() . ", Line: " . $exception->getLine());
        }
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->product);
    }
}
