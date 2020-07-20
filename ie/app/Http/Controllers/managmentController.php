<?php

namespace App\Http\Controllers;

use App\Models\Commercial;
use App\Models\User;
use Illuminate\Http\Request;

include_once public_path("files/cities.php");
class managmentController extends Controller
{
    public function index (){
        $users = User::get_users_count();
        $users = $users->users;
        $cities = User::get_top_cities_for_dashboard();
        $registered_users = User::get_user_register_rate();
        $coms = Commercial::get_commercial_rate();
        if (count($cities) > 0){
            foreach ($cities as $city)
                $city->city = find_city($city->city);
        }
        return view('management.index', compact('users', 'cities', 'registered_users','coms'));
    }

    public function show_category_page(){
        return view('management.category');
    }

    public function show_users_page(){
        return view('management.users');
    }
}
