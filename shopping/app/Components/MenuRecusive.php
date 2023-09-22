<?php 
namespace App\Components;

use App\Models\Menu;

class MenuRecusive{
    private $html ='';
    private $menu;
    private $arr_disabled = [];
    private $arr_deleted = [];
    public function __construct(Menu $menu){
        $this->menu = $menu;
    }

    public function menuRecusiveAdd($parent_id,$id = 0, $subMark = '') { // 4 // 0
        $menus = $this->menu->all(); // get all records in table menus
        foreach($menus as $menuItem){
            if($menuItem->parent_id == $id)
            {
                if(!empty($parent_id) && $parent_id == $menuItem->id)
                {
                    $this->html .= "<option value ='$menuItem->id' selected>". $subMark . $menuItem->name."</option>";       
                }
                else
                {
                    $this->html .= "<option value ='$menuItem->id'>". $subMark . $menuItem->name."</option>";
                }

                $this->menuRecusiveAdd($parent_id,$menuItem->id, $subMark."&nbsp;-"); 
            }
        }

        return $this->html;
    }

    public function delMenuRecusive($id){
        array_push($this->arr_deleted,$id);
        foreach($this->menu->all() as $menu)
        {
            if($menu->parent_id == $id)
                $this->delMenuRecusive($menu->id);
        }

        return $this->arr_deleted;
    }


    // public function getarr()
    // {
    //     return $this->arr_dis;
    // }

    // public function findChildren($id){ 
    //     $menus = $this->menu->all();
    //     foreach($menus as $menuItem){
    //         if($menuItem->parent_id == $id){
    //             array_push($this->arr_disabled,$menuItem->id);
    //             $this->findChildren($menuItem->id);
    //         }
    //     }
    //     return $this->arr_disabled;
    // }

}
?>