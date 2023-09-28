<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Components\Recusive;
use Illuminate\Support\Str;
use  Illuminate\Support\Facades\DB;

class AdminCategoryController extends Controller
{
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function index()
    {
        $categories = $this->category->latest()->paginate(5);
        return view('admin.category.index', compact('categories'));
    }
    public function create()
    {
        $htmlOption = $this->getCategory($parentId = '');
        return view('admin.category.add', compact('htmlOption'));
    }

    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            $this->category->create([
                'name' => $request->name,
                'parent_id' => $request->parent_id,
                'slug' => Str::slug($request->name)
            ]);
        });
        return redirect()->route('categories.index');
    }

    public function getCategory($parentId)
    {
        $recusive = new Recusive($this->category->all());
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }

    public function edit($id)
    {
        $data = $this->category->Where('id', $id)->firstOrFail();
        $htmlOption = $this->getCategory($data->parent_id);
        return view('admin.category.edit', compact('data', 'htmlOption'));
    }

    public function update(Request $request, $id)
    {
        $this->category::Where('id', $id)
            ->update([
                'name' => $request->name,
                'parent_id' => $request->parent_id,
                'slug' => Str::slug($request->name)
            ]);
        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        //TH1: danh muc can xoa kh co danh muc con
        //TH2: danh muc can xoa co danh muc con
        //TH3: danh muc can xoa co danh muc con, danh muc con lai co them danh muc con nua..
        // ==> dung de qui
        $categories = $this->category->all();
        $recusive = new Recusive($categories);
        $del_arr = $recusive->delCategoryRecusive($id);
        $this->category->whereIn('id', $del_arr)->delete();
        return redirect()->route('categories.index');
    }
}
