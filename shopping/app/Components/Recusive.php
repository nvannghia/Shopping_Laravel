<?php 
namespace App\Components;
use App\Models\Category;
class Recusive{

    private $data;
    private $htmlSelect = "";
    private $arr_deleted = array();

    public function __construct($data)
    {
        $this->data = $data;
    }

    function categoryRecusive($parentId,$id = 0, $text = '') // 1 // 0 // ''
    {
        //data current is all records of category
        foreach ($this->data as $category) {
            if ($category->parent_id == $id) {
                if(!empty($parentId) && $parentId == $category->id){
                    $this->htmlSelect .= " <option value='{$category->id}' selected> " . $text . $category->name . "</option>";
                }
                else{
                    $this->htmlSelect .= " <option value='{$category->id}'> " . $text . $category->name . "</option>";
                }
                $this->categoryRecusive($parentId,$category['id'], $text ."&nbsp;-");
            }
        }
        return $this->htmlSelect;
    }

    //idea function delCategoryRecusive 
    //  $deleted_arr = array();
    //     array_push($deleted_arr,$id);
    //     foreach($this->category->all() as $cate)
    //     {
    //         if($cate->parent_id == $id)
    //         {
    //             array_push($deleted_arr,$cate->id);
    //             foreach($this->category->all() as $cate2)
    //             {
    //                 if($cate2->parent_id == $cate->id)
    //                     array_push($deleted_arr,$cate2->id);
    //             }
    //         }
    //     }

    public function delCategoryRecusive($id)
    { 
        array_push($this->arr_deleted,$id);
        foreach($this->data as $cate)
        {
            if($cate->parent_id == $id)
            {
                $this->delCategoryRecusive($cate->id);
            }
        }
        return $this->arr_deleted;
    }
    }


?>