<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    public static function get_all_categories()
    {
        return DB::table('category')->select('category.*')->get();
    }

    public static function get_subcat_for_category($id)
    {
        return DB::table('sub_category')->where('cat_id', '=', $id)->get();
    }

    public static function find_category($id)
    {
        return DB::table('category')->select('name')->where('id', '=', $id)->get()[0];
    }
    public static function find_subcategory($id)
    {
        return DB::table('sub_category')->select('name')->where('id', '=', $id)->get()[0];
    }

}
