<?php

namespace App\Http\Controllers;

use App\Components\MenuRecusive;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminMenuController extends Controller
{
    private $menuRecusive;
    private $menu;

    public function __construct(MenuRecusive $menuRecusive, Menu $menu) // $menuRecusive là instanceof class MenuRecusive, và đã gọi constructor
    {
        $this->menuRecusive = $menuRecusive; // $this->menuRecusive bây giờ là đối tượng của class MenuRecusive
        $this->menu = $menu; // $this->menu bây giờ là đối tượng của class Menu
    }

    public function index()
    {
        $menus = $this->menu->simplePaginate(5);
        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        $optionSelect = $this->menuRecusive->menuRecusiveAdd('');
        return view('admin.menus.add', compact('optionSelect'));
    }

    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            $this->menu->create([
                'name' => $request->name,
                'parent_id' => $request->parent_id,
                'slug' => Str::slug($request->name)
            ]);
        });

        return redirect()->route('menus.index');
    }

    public function edit($id)
    {
        $menu = $this->menu->find($id);
        $optionSelect = $this->menuRecusive->menuRecusiveAdd($menu->parent_id);
        return view('admin.menus.edit', compact('menu', 'optionSelect'));
    }

    public function update($id, Request $request)
    {
        DB::transaction(function () use ($request, $id) {
            $this->menu->find($id)->update([
                'name' => $request->name,
                'parent_id' => $request->parent_id,
                'slug' => Str::slug($request->name)
            ]);
        });

        return redirect()->route('menus.index');
    }

    public function delete($id)
    {
        $arr_deleted = $this->menuRecusive->delMenuRecusive($id);
        $this->menu->WhereIn('id', $arr_deleted)->delete();
        return redirect()->route('menus.index');
    }
}
