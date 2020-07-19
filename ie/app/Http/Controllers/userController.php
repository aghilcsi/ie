<?php

namespace App\Http\Controllers;

use App\Models\Commercial;
use App\Models\User;
use Illuminate\Http\Request;

include public_path("files/cities.php");

class userController extends Controller
{
    public function view_profile(Request $request)
    {
        $id = $request->session()->get('ie-id');
        $user = User::get_user_info('id', $id);
        $role = $user->role;
        $display_name = $user->name;
        $date = $user->date;
        if ($user->insta == null) {
            $user->insta = "تعیین نشده";
        }
        if ($user->fb == null) {
            $user->fb = "تعیین نشده";
        }
        if ($user->tw == null) {
            $user->tw = "تعیین نشده";
        }
        $email = $user->email;
        $email_format = $email[0] . $email[1] . $email[2];
        $stop = strpos($email, '@');
        $rest = substr($email, $stop);
        for ($i = 3; $i < $stop; $i++) {
            $email_format .= '*';
        }
        $email_format .= $rest;
        $user->email = $email_format;
        $user->city = find_city($user->city);

        if (file_exists(public_path("images/users/" . $user->id . ".jpg"))) {
            $src = asset("images/users/" . $user->id . ".jpg");
        } else {
            $src = asset("images/website/profile.png");
        }

        return view('partials.profile.view', compact('user', 'src', 'role', 'display_name', 'date', 'id'));
    }

    public function edit_profile(Request $request)
    {
        $id = $request->session()->get("ie-id");
        $user = User::get_user_info('id', $id);
        $role = $user->role;
        $display_name = $user->name;
        $date = $user->date;
        $tel = "";
        $tel2 = "";
        if (strpos($user->tel, ';') > 0) {
            $tel = explode(";", $user->tel)[0];
            $tel2 = explode(";", $user->tel)[1];
        } else {
            $tel = $user->tel;
        }
        if (file_exists(public_path("images/users/" . $user->id . ".jpg"))) {
            $src = asset("images/users/" . $user->id . ".jpg");
        } else {
            $src = asset("images/website/profile.png");
        }

        return view('partials.profile.edit', compact('user', 'role', 'tel', 'tel2', 'src', 'id', 'date', 'display_name'));
    }

    public function edit_me(Request $request)
    {
        $image = $request->file('image');
        $id = $request->session()->get('ie-id');

        if ($image != null) {
            $image->move(public_path("images/users/"), $id . '.jpg');
        }

        $errors = [];

        $name = str_replace(array('"', "'", '#'), "", trim($request->input('name')));
        if (strlen($name) < 7 && count($errors) == 0) {
            $errors[0] = "نام وارد شده از حد مجاز کوتاه تر است";
        } elseif (strlen($name) > 40 && count($errors) == 0) {
            $errors[0] = "نام وارد شده از حد مجاز طولانی تر است";
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

        $tel2 = str_replace(array('"', "'", '#'), "", trim($request->input('tel2')));
        if ($tel2 != "") {
            preg_match('/[0-9]+/', $tel2, $res);
            if (count($res) > 0) {
                $tel2 = $res[0];
            } elseif (count($errors) == 0) {
                $errors[0] = "شماره تماس نامعتبر است";
            }
            if (strlen($tel2) > 12 && count($errors) == 0) {
                $errors[0] = "شماره تماس نامعتبر است";
            } elseif (strlen($tel2) < 10 && count($errors) == 0) {
                $errors[0] = "شماره تماس نامعتبر است";
            }
        }

        $insta = str_replace(array('"', "'"), "", trim($request->input('insta')));
        if (strlen($insta) > 20 && count($errors) == 0) {
            $errors[0] = "آی دی اینستاگرام بسیار طولانی است";
        }
        $tw = str_replace(array('"', "'"), "", trim($request->input('tw')));
        if (strlen($tw) > 20 && count($errors) == 0) {
            $errors[0] = "آی دی توییتر بسیار طولانی است";
        }
        $fb = str_replace(array('"', "'"), "", trim($request->input('fb')));
        if (strlen($fb) > 20 && count($errors) == 0) {
            $errors[0] = "آی دی فیسبوک بسیار طولانی است";
        }

        if (count($errors) == 0) {
            $user_tell = $tel;
            if ($tel2 != "") {
                $user_tell .= ';' . $tel2;
            }
            $data = [
                "name" => $name,
                "address" => $address,
                "fb" => $fb,
                "insta" => $insta,
                "tw" => $tw,
                "tel" => $user_tell
            ];
            User::update_user($id, $data);
            return redirect()->route('view_profile');

        } else {
            if (file_exists(public_path("images/users/" . $id . ".jpg"))) {
                $src = asset("images/users/" . $user->id . ".jpg");
            } else {
                $src = asset("images/website/profile.png");
            }

            return view("partials.profile.edit", compact('errors', 'name', 'tel', 'tel2', 'fb', 'insta', 'tw', 'address', 'src'));
        }
    }

    public function show_delete_account(Request $request)
    {
        $id = $request->session()->get("ie-id", 0);
        $user = User::get_user_info('id', $id);
        $role = $user->role;
        $display_name = $user->name;
        $date = $user->date;
        return view('partials.profile.delete', compact('id', 'role', 'display_name', 'date'));
    }

    public function delete_the_account(Request $request)
    {
        $id = $request->input('id');
        // delete commercial images
        $coms = Commercial::get_commercials_for_me($id);
        if (count($coms) > 0) {
            foreach ($coms as $com) {
                $this->delete_directory(public_path("images/commercials/" . $com->id));
            }
        }
        //delete commercials for user
        Commercial::delete_commercial_for_user($id);
        //delete user image if exists
        if (file_exists(public_path("images/users/" . $id . ".jpg"))) {
            unlink(public_path("images/users/" . $id . ".jpg"));
        }
        // delete user
        User::delete_user($id);
        $request->session()->flash('ie-id', "");

        return redirect()->route('login');
    }

    public function logout_me(Request $request)
    {
        $request->session()->flash('ie-id', "");

        return redirect()->route('login');
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
