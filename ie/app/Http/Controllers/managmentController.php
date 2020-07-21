<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Commercial;
use App\Models\User;
use Illuminate\Http\Request;

include_once public_path("files/cities.php");

class managmentController extends Controller
{
    public function index()
    {
        // init user table and chart for dashboard
        $users = User::get_users_count();
        $users = $users->users;
        $cities = User::get_top_cities_for_dashboard();
        $registered_users = User::get_user_register_rate();
        $coms = Commercial::get_commercial_rate();
        if (count($cities) > 0) {
            foreach ($cities as $city)
                $city->city = find_city($city->city);
        }

        // init category table for dashboard
        $com_count = Commercial::get_commercial_count();
        $com_count = $com_count->coms;
        $cats = Category::get_all_categories();
        $result_for_cat_table = [];
        foreach ($cats as $cat) {
            $count_for_cat = Commercial::get_category_count($cat->id);
            $current_data = [$cat->id, $cat->name, $count_for_cat->cats];
            $subcats = Category::get_subcat_for_category($cat->id);
            if (count($subcats) > 0) {
                foreach ($subcats as $sbcat) {
                    $count_for_subcat = Commercial::get_subcat_count($sbcat->id);
                    array_push($current_data, $sbcat->name, $count_for_subcat->subcats);
                }
            }
            array_push($result_for_cat_table, $current_data);
        }

        return view('management.index', compact('users', 'cities', 'registered_users', 'coms', 'result_for_cat_table', 'com_count'));
    }

    public function show_category_page()
    {
        return view('management.category');
    }

    public function show_users_page()
    {
        return view('management.users');
    }

    public function new_subcat(Request $request)
    {
        $cat = $request->input('cat');
        $subcat = $request->input('subcat');
        Category::new_subcat($cat, $subcat);

        return redirect()->refresh();
    }
}
