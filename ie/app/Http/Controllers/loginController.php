<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Commercial;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

include public_path() . '/files/encrypt.php';

class loginController extends Controller
{

    public function show_login_page(Request $request)
    {
        User::get_user_register_rate();
        $email = $pass = "";
        $rm = null;
        if (Cookie::has('ie-rm')) {
            $cook = Cookie::get('ie-rm');
            if ($cook != null) {
                $email = $cook;
                $pass = User::get_password($email);
                $rm = 1;
            }
        }

        if ($request->session()->has('ie-id')) {
            $request->session()->forget('ie-id');
        }
        return view("partials.login.login", compact("email", "pass", "rm"));
    }

    public function show_register_page()
    {
        return view("partials.login.register");
    }

    public function show_forgot_page()
    {
        return view("partials.login.forgot");
    }

    public function show_account_page(Request $request)
    {
        if ($request->session()->has('ie-id')) {
            $id = $request->session()->get("ie-id", 0);
            if ($id === 0) {
                return redirect()->route('login');
            }
            $data = User::get_user_info("id", $id);
            $display_name = $data->name;
            $date = $data->date;
            $commercials = Commercial::get_commercials_for_me($id);
            $categories = Category::get_all_categories();
            $user_city = User::get_user_city();
            $role = $data->role;
            return view("partials.pages.main", compact('commercials', 'display_name', 'date', 'role', 'id', 'categories', 'user_city'));

        } else
            return view('errors.404');
    }

    public function my_register(Request $request)
    {
        $errors = [];

        $name = str_replace(array('"', "'", '#'), "", trim($request->input('name')));
        if (strlen($name) < 7 && count($errors) == 0) {
            $errors[0] = "نام وارد شده از حد مجاز کوتاه تر است";
        } elseif (strlen($name) > 40 && count($errors) == 0) {
            $errors[0] = "نام وارد شده از حد مجاز طولانی تر است";
        }

        $email = str_replace(array('"', "'"), "", trim($request->input('email')));
        if (strpos($email, 'www.') === 0) {
            $email = str_replace("www.", "", $email);
        }
        if (strpos($email, '#') !== false && count($errors) == 0) {
            $errors[0] = "فیلد ایمیل نمی تواند حاوی کاراکتر # باشد";
        } elseif (strlen($email) > 50 && count($errors) == 0) {
            $errors[0] = "ایمیل وارد شده بسیار طولانی است و پذیرفته نمیشود. ایمیل دیگری را وارد کنید";
        } elseif (count($errors) == 0 && User::check_email_existence($email) === true) {
            $errors[0] = "ایمیل وارد شده قبلا در سامانه ثبت شده است. با ایمیل دیگری ثبت نام کنید";
        }

        $pass = $request->input('pass');
        if ((strpos($pass, '"') !== false || strpos($pass, "'") !== false || strpos($pass, '#') !== false) && count($errors) == 0) {
            $errors[0] = "رمز نمی تواند حاوی کوتیشن ها و کاراکتر # باشد. رمز وارد شده را اصلاح نمایید";
        } elseif (strlen($pass) < 6 && count($errors) == 0) {
            $errors[0] = "رمز تعیین شده بسیار کوتاه و نا امن است. رمز طولانی تری انتخاب کنید";
        } elseif (strlen($pass) > 20 && count($errors) == 0) {
            $errors[0] = "رمز تعیین شده بسیار طولانی است. رمز کوتاه تری انتخاب کنید";
        }

        $conform_pass = $request->input('conform-pass');
        if ($pass != $conform_pass && count($errors) == 0) {
            $errors[0] = "رمز و تایید رمز با یکدیگر مطابقت ندارند. در وارد کردن آن دقت کنید";
            $conform_pass = '';
        }

        $address = str_replace(array("'", '"', '#'), "", trim($request->input('address')));

        $tel = str_replace(array('"', "'", '#'), "", trim($request->input('tel')));
        preg_match('/[0-9]+/', $tel, $res);
        if (count($res) > 0) {
            $tel = $res[0];
        } elseif (count($errors) == 0) {
            $errors[0] = "شماره تماس نامعتبر است";
        }
        if (strlen($tel) > 12 && count($errors) == 0) {
            $errors[0] = "شماره تماس نامعتبر است";
        } elseif (strlen($tel) < 10 && count($errors) == 0) {
            $errors[0] = "شماره تماس نامعتبر است";
        }

        $city = $request->input('city');
        if ($city == "0" && count($errors) == 0) {
            $errors[0] = "لظفا استان خود را انتخاب کنید";
        }

        if (count($errors) > 0) {
            return view("partials.login.register",
                compact('errors', 'name', 'email', 'city', 'tel', 'address', 'pass', 'conform_pass'));
        } else {
            $date = date("Y-m-d");
            $new_user = [
                "name" => $name,
                "email" => $email,
                "pass" => $pass,
                "city" => $city,
                "address" => $address,
                "tel" => $tel,
                "role" => '0',
                "date" => $date
            ];
            User::insert($new_user);
            $user_id = User::get_user_info('email', $email);
            $request->session()->put('ie-id', $user_id->id);
            return redirect()->route('main');
        }
    }

    public function my_login(Request $request)
    {
        $email = $request->input('email');
        $pass = $request->input('pass');
        $rm = $request->input('rm');
        if (User::check_email_existence(trim($email))) {
            if (User::check_pass(trim($email), $pass)) {

                $cookie = Cookie::get('ie-rm');
                if (($cookie == null) && $rm != null) {
                    Cookie::queue(Cookie::make('ie-rm', $email, 518400));
                } elseif ($cookie != null && $rm == null) {
                    Cookie::queue(Cookie::make('ie-rm', null, 518400));
                }

                $data = User::get_user_info("email", $email);
                $id = $data->id;
                $request->session()->put("ie-id", $id);

                return redirect()->route('main');


            } else {
                $errors = ["رمز ورود اشتباه است"];

                return view('partials.login.login', compact('errors', 'email', 'pass', 'rm'));
            }
        } else {
            $errors = ["ایمیل شما در سامانه ما نا معتبر است"];

            return view('partials.login.login', compact('errors', 'email', 'pass', 'rm'));
        }
    }

    public function get_cities()
    {

    }
}
