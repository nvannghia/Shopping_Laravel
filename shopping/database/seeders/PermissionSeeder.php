<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // records have parent_id = 0 is biggest parent, otherwise(parent_id != 0) is child
        DB::table('permissions')->insert([
            ['name' => 'categories', 'display_name' => 'Danh mục sản phẩm', 'parent_id' => 0, 'key_code' => '1'],
            ['name' => 'categories_list', 'display_name' => 'Danh sách danh mục', 'parent_id' => 1, 'key_code' => 'list_category'],
            ['name' => 'categories_insert', 'display_name' => 'Thêm danh mục', 'parent_id' => 1, 'key_code' => 'add_category'],
            ['name' => 'categories_edit', 'display_name' => 'Sửa danh mục', 'parent_id' => 1, 'key_code' => 'edit_category'],
            ['name' => 'categories_delete', 'display_name' => 'Xóa danh mục', 'parent_id' => 1, 'key_code' => 'delete_category'],

            ['name' => 'menus', 'display_name' => 'Menu', 'parent_id' => 0, 'key_code' => '1'],
            ['name' => 'menus_list', 'display_name' => 'Danh sách menu', 'parent_id' => 6, 'key_code' => 'list_menu'],
            ['name' => 'menus_insert', 'display_name' => 'Thêm menu', 'parent_id' => 6, 'key_code' => 'add_menu'],
            ['name' => 'menus_edit', 'display_name' => 'Sửa menu', 'parent_id' => 6, 'key_code' => 'edit_menu'],
            ['name' => 'menus_delete', 'display_name' => 'Xóa menu', 'parent_id' => 6, 'key_code' => 'delete_menu'],

            ['name' => 'products', 'display_name' => 'Sản phẩm', 'parent_id' => 0, 'key_code' => '1'],
            ['name' => 'products_list', 'display_name' => 'Danh sách sản phẩm', 'parent_id' => 11, 'key_code' => 'list_product'],
            ['name' => 'products_insert', 'display_name' => 'Thêm sản phẩm', 'parent_id' => 11, 'key_code' => 'add_product'],
            ['name' => 'products_edit', 'display_name' => 'Sửa sản phẩm', 'parent_id' => 11, 'key_code' => 'edit_product'],
            ['name' => 'products_delete', 'display_name' => 'Xóa sản phẩm', 'parent_id' => 11, 'key_code' => 'delete_product'],

            ['name' => 'sliders', 'display_name' => 'slider', 'parent_id' => 0, 'key_code' => '1'],
            ['name' => 'sliders_list', 'display_name' => 'Danh sách slider', 'parent_id' => 16, 'key_code' => 'list_slider'],
            ['name' => 'sliders_insert', 'display_name' => 'Thêm slider', 'parent_id' => 16, 'key_code' => 'add_slider'],
            ['name' => 'sliders_edit', 'display_name' => 'Sửa slider', 'parent_id' => 16, 'key_code' => 'edit_slider'],
            ['name' => 'sliders_delete', 'display_name' => 'Xóa slider', 'parent_id' => 16, 'key_code' => 'delete_slider'],

            ['name' => 'settings', 'display_name' => 'setting', 'parent_id' => 0, 'key_code' => '1'],
            ['name' => 'settings_list', 'display_name' => 'Danh sách setting', 'parent_id' => 21, 'key_code' => 'list_setting'],
            ['name' => 'settings_insert', 'display_name' => 'Thêm setting', 'parent_id' => 21, 'key_code' => 'add_setting'],
            ['name' => 'settings_edit', 'display_name' => 'Sửa setting', 'parent_id' => 21, 'key_code' => 'edit_setting'],
            ['name' => 'settings_delete', 'display_name' => 'Xóa setting', 'parent_id' => 21, 'key_code' => 'delete_setting'],

            ['name' => 'users', 'display_name' => 'Nhân viên', 'parent_id' => 0, 'key_code' => '1'],
            ['name' => 'users_list', 'display_name' => 'Danh sách nhân viên', 'parent_id' => 26, 'key_code' => 'list_user'],
            ['name' => 'users_insert', 'display_name' => 'Thêm nhân viên', 'parent_id' => 26, 'key_code' => 'add_user'],
            ['name' => 'users_edit', 'display_name' => 'Sửa nhân viên', 'parent_id' => 26, 'key_code' => 'edit_user'],
            ['name' => 'users_delete', 'display_name' => 'Xóa nhân viên', 'parent_id' => 26, 'key_code' => 'delete_user'],

            ['name' => 'roles', 'display_name' => 'Vai trò', 'parent_id' => 0, 'key_code' => '1'],
            ['name' => 'roles_list', 'display_name' => 'Danh sách vai trò', 'parent_id' => 31, 'key_code' => 'list_role'],
            ['name' => 'roles_insert', 'display_name' => 'Thêm vai trò', 'parent_id' => 31, 'key_code' => 'add_role'],
            ['name' => 'roles_edit', 'display_name' => 'Sửa vai trò', 'parent_id' => 31, 'key_code' => 'edit_role'],
            ['name' => 'roles_delete', 'display_name' => 'Xóa vai trò', 'parent_id' => 31, 'key_code' => 'delete_role']
        ]);
    }
}
