<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Commercial;
use App\Models\User;
use Illuminate\Http\Request;

include public_path('files/encrypt.php');
include public_path('files/cities.php');
include_once public_path('files/jdf.php');

class commercialController extends Controller
{
    public function show_add_commercial_page(Request $request)
    {
        $id = $request->session()->get("ie-id");
        $data = User::get_user_info("id", $id);
        $role = $data->role;
        $display_name = $data->name;
        $date = $data->date;
        $categories = Category::get_all_categories();

        return view('partials.pages.commercial_form', compact('display_name', 'role', 'date', 'categories', 'id'));
    }

    public function com_store(Request $request)
    {
        $title = str_replace(array('"', "'", '#'), "", trim($request->input('title')));
        $brand = str_replace(array('"', "'", '#'), "", trim($request->input('brand')));
        $description = str_replace(array('"', "'", '#'), "", trim($request->input('description')));
        $year = $request->input('year');
        $price = $request->input('price');
        $cat = $request->input('cat');
        $subcat = $request->input('subcat');
        $images = $request->file('images');
        if ($images == null) {
            $images = [];
        }
        $errors = [];

        if (strlen($title) < 3 && count($errors) == 0) {
            $errors[0] = "عنوان وارد شده بسیار کوتاه است";
        } elseif (strlen($title) > 50 && count($errors) == 0) {
            $errors[0] = "عنوان وارد شده بسیار طولانی است";
        }

        if (strlen($brand) < 2 && count($errors) == 0) {
            $errors[0] = "برند وارد شده بسیار کوتاه است";
        }
        if (strlen($brand) > 20 && count($errors) == 0) {
            $errors[0] = "برند وارد شده بسیار طولانی است";
        }

        if (strlen($year) != 4 && count($errors) == 0) {
            $errors[0] = "سال وارد شده نامعتبر است";
        }
        if ($year < 1340 && count($errors) == 0) {
            $errors[0] = "سال تولید باید بعد از 1340 باشد";
        }
        if ($year > 1500 && count($errors) == 0) {
            $errors[0] = "سال وارد شده نا معتبر است";
        }

        if (strlen($price) < 3 && count($errors) == 0) {
            $errors[0] = "قیمت وارد شده نامعتبر است";
        } elseif (strlen($price) > 10 && count($errors) == 0) {
            $errors[0] = "قیمت وارد شده بسیار زیاد است";
        }

        if ($cat == '0' && count($errors) == 0) {
            $errors[0] = "لطفا دسته بندی اصلی را انتخاب کنید";
        }
        if ($subcat == '0' && count($errors) == 0) {
            $errors[0] = "لطفا دسته بندی ها را انتخاب کنید";
        }


        if (($images == null || count($images) <= 0) && count($errors) == 0) {
            $errors[0] = "لطفا برای محصول خود حداقل یک عکس انتخاب کنید";
        } elseif (count($images) > 10 && count($errors) == 0) {
            $errors[0] = "حداکثر تعداد عکس ها 10 عدد می باشد. تعداد عکس ها را کاهش دهید";
        }

        $user_id = $request->session()->get("ie-id");
        $data = User::get_user_info("id", $user_id);
        $display_name = $data->name;
        $date = $data->date;

        if (count($errors) == 0) {
            $id = Commercial::generate_id();
            $data = [
                'id' => $id,
                'title' => $title,
                'brand' => $brand,
                'description' => $description,
                'time' => date("H:i:s"),
                'date' => date("Y-m-d"),
                'cat_id' => $cat,
                'subcat_id' => $subcat,
                'user_id' => $user_id,
                'year' => $year,
                'price' => $price
            ];
            if (!file_exists(public_path() . '/images/commercials/' . $id)) {
                mkdir(public_path() . '/images/commercials/' . $id);
            }
            for ($i = 0; $i < count($images); $i++) {
                $images[$i]->move(public_path("images/commercials/" . $id . "/"), $i . '.jpg');
            }
            Commercial::insert($data);

            return redirect()->route('main');
        } else {
            $categories = Category::get_all_categories();

            return view("partials.pages.commercial_form",
                compact('errors', 'display_name', 'categories', 'date', 'title', 'description', 'cat', 'subcat', 'price', 'year', 'brand'));
        }

    }

    public function show_mycommercial_page(Request $request)
    {
        if ($request->input('sklvd')) {
            $id = $request->session()->get('ie-id');
            $com_id = decode_me($request->input('sklvd'));
            if ($com_id == 0) {
                return redirect()->route('main');
            } else {
                if (Commercial::conform_commercial_for_user($id, $com_id)) {
                    $data = User::get_user_info("id", $id);
                    $role = $data->role;
                    $display_name = $data->name;
                    $date = $data->date;
                    $images = array_diff(scandir(public_path("images/commercials/" . $com_id)), array('.', '..'));

                    $com = Commercial::get_cat_and_subcat_for_commercial($com_id);

                    return view('partials.pages.commercial_detail', compact('com', 'role', 'images', 'com_id', 'display_name', 'date', 'id'));
                } else {
                    return view('errors.404');
                }
            }
        } else {
            return view('errors.404');
        }
    }

    public function com_cat_ajax(Request $request)
    {
        $id = $request->input('cat_id');
        $sub_cats = Category::get_subcat_for_category($id);
        $res = "<option value='0'>انتخاب کنید</option>";
        if (count($sub_cats) > 0) {
            foreach ($sub_cats as $sub_cat) {
                $res .= "<option value='" . $sub_cat->id . "'>" . $sub_cat->name . "</option>";
            }

            return ["result" => $res, 'success' => true];
        } else {
            return ["success" => false];
        }

    }

    public function delete_com(Request $request)
    {
        $id = $request->input('id');
        $this->delete_directory(public_path("images/commercials/" . $id));
        Commercial::delete_commercial($id);

        return redirect()->route('main');
    }

    public function show_edit_form(Request $request)
    {

        $com_id = decode_me($request->input('sklvd'));
        if ($com_id == 0) {
            return redirect()->route('main');
        }
        $com = Commercial::get_the_commercial($com_id);
        $title = $com->title;
        $brand = $com->brand;
        $year = $com->year;
        $price = $com->price;
        $description = $com->description;
        $com_edit = true;
        $id = $request->session()->get('ie-id');
        $user = User::get_user_info('id', $id);
        $role = $user->role;
        $display_name = $user->name;
        $date = $user->date;

        return view('partials.pages.commercial_form',
            compact('title', 'brand', 'display_name', 'date', 'role', 'description', 'price', 'com_edit', 'year', 'com_id', 'id'));
    }

    public function edit_com(Request $request)
    {

        $id = decode_me($request->input('id'));
        if ($id == 0) {
            return redirect()->route('main');
        }

        $com_edit = true;

        $title = str_replace(array('"', "'", '#'), "", trim($request->input('title')));
        $brand = str_replace(array('"', "'", '#'), "", trim($request->input('brand')));
        $description = str_replace(array('"', "'", '#'), "", trim($request->input('description')));
        $year = $request->input('year');
        $price = $request->input('price');
        $errors = [];

        if (strlen($title) < 3 && count($errors) == 0) {
            $errors[0] = "عنوان وارد شده بسیار کوتاه است";
        } elseif (strlen($title) > 50 && count($errors) == 0) {
            $errors[0] = "عنوان وارد شده بسیار طولانی است";
        }
        if (strlen($brand) < 2 && count($errors) == 0) {
            $errors[0] = "برند وارد شده بسیار کوتاه است";
        }
        if (strlen($brand) > 20 && count($errors) == 0) {
            $errors[0] = "برند وارد شده بسیار طولانی است";
        }
        if (strlen($year) != 4 && count($errors) == 0) {
            $errors[0] = "سال وارد شده نامعتبر است";
        }
        if ($year < 1340 && count($errors) == 0) {
            $errors[0] = "سال تولید باید بعد از 1340 باشد";
        }
        if ($year > 1500 && count($errors) == 0) {
            $errors[0] = "سال وارد شده نا معتبر است";
        }
        if (strlen($price) < 3 && count($errors) == 0) {
            $errors[0] = "قیمت وارد شده نامعتبر است";
        } elseif (strlen($price) > 10 && count($errors) == 0) {
            $errors[0] = "قیمت وارد شده بسیار زیاد است";
        }

        if (count($errors) == 0) {
            $data = [
                "id" => $id,
                "title" => $title,
                "description" => $description,
                "brand" => $brand,
                "price" => $price,
                "year" => $year
            ];
            Commercial::update_me($data);

            return redirect()->route('show_my_com', ['sklvd' => $id]);
        } else {
            $user = User::get_user_info('id', $request->session()->get('ie-id'));
            $display_name = $user->name;
            $date = $user->date;

            return view("partials.pages.commercial_form",
                compact('errors', 'display_name', 'date', 'title', 'description', 'price', 'year', 'brand', 'com_edit'));
        }

    }

    public function commercials_of_people()
    {
        $id = Request()->session()->get("ie-id");
        $user = User::get_user_info("id", $id);
        $role = $user->role;
        $display_name = $user->name;
        $date = $user->date;
        $coms = Commercial::apply_commercial_filter();
        $categories = Category::get_all_categories();
        $user_city = User::get_user_city();
        $cat = str_replace(array('"', "'", "#"), "", Request()->input('gls'));
        $subCat = str_replace(array('"', "'", "#"), "", Request()->input('vtq'));
        $com_date = str_replace(array('"', "'", "#"), "", Request()->input('fee'));
        $brand = str_replace(array('"', "'", "#"), "", Request()->input('brd'));
        $year = str_replace(array('"', "'", "#"), "", Request()->input('yrr'));
        $price_s = str_replace(array('"', "'", "#"), "", Request()->input('dsp'));
        $price_e = str_replace(array('"', "'", "#"), "", Request()->input('esp'));

        if ($cat != 0 && $cat != '') {
            $cat = Category::find_category($cat);
            $cat = $cat->name;
        } else {
            $cat = '';
        }
        if ($subCat != 0 && $subCat != '') {
            $subCat = Category::find_subcategory($subCat);
            $subCat = $subCat->name;
        } else {
            $subCat = '';
        }

        return view('partials.pages.view_commercials',
            compact('categories', 'user_city', 'coms', 'role', 'cat', 'subCat', 'date', 'com_date', 'display_name', 'id', 'brand', 'year', 'price_e', 'price_s'));

    }

    public function commercial_view(Request $request)
    {
        if ($request->input('sklvd')) {
            $com_id = decode_me($request->input('sklvd'));
            $id = $request->session()->get("ie-id");
            if ($com_id == 0) {
                return redirect()->route('main');
            } else {
                if (Commercial::conform_commercial_for_user($id, $com_id))
                    return view('errors.404');
                $images = array_diff(scandir(public_path("images/commercials/" . $com_id)), array('.', '..'));

                $com = Commercial::get_cat_and_subcat_for_commercial($com_id);
                $user_id = $com->user_id;
                $user = User::get_user_info('id', $user_id);
                $role = $user->role;
                $city = find_city($user->city);
                $user->city = $city;
                $current_user = User::get_user_info('id', $id);
                $display_name = $current_user->name;
                $date = $current_user->date;
                $src = false;
                if (file_exists(public_path('images/users/' . $user_id . '.jpg'))) {
                    $src = true;
                }
                if ($user->insta == '' || $user->insta == null) {
                    $user->insta = 'نامشخص';
                }
                if ($user->fb == '' || $user->fb == null) {
                    $user->fb = 'نامشخص';
                }
                if ($user->tw == '' || $user->tw == null) {
                    $user->tw = 'نامشخص';
                }
                $from_outSide = true;

                return view('partials.pages.view_single_commercial', compact('com', 'role', 'images', 'date', 'display_name', 'com_id', 'id', 'from_outSide', 'user', 'src'));
            }
        } else {
            return redirect()->route('main');
        }
    }

    public function rate_increment_ajax(Request $request)
    {
        $id = $request->input('id');
        Commercial::increment_com_rate($id);
    }

    function delete_directory($dirname)
    {
        if (is_dir($dirname)) {
            $dir_handle = opendir($dirname);
        }
        if (!$dir_handle) {
            return false;
        }
        while ($file = readdir($dir_handle)) {
            if ($file != "." && $file != "..") {
                if (!is_dir($dirname . "/" . $file)) {
                    unlink($dirname . "/" . $file);
                } else {
                    delete_directory($dirname . '/' . $file);
                }
            }
        }
        closedir($dir_handle);
        rmdir($dirname);

        return true;
    }
}
