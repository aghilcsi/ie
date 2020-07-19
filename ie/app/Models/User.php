<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    protected $table = "users";
    protected $fillable = ["name,email,pass,city,address,date,role,tel,insta,tw,fb"];
    protected $guarded = ['id'];
    public $timestamps = false;

    public static function check_email_existence($email)
    {
        $res = DB::table('users')->select('email')->where('email', '=', trim($email))->get();
        if (count($res) == 0) {
            return false;
        }

        return true;
    }

    public static function check_pass($email, $pass)
    {
        $res = DB::table("users")->select('pass')->where('email', '=', $email)->get();
        if (count($res) > 0) {
            $res = $res[0]->pass;
            if ($res == $pass) {
                return true;
            }

            return false;
        }

        return false;
    }

    public static function get_password($email)
    {
        $res = DB::table('users')->select('pass')->where('email', '=', $email)->get();
        if (count($res) == 1) {
            return $res[0]->pass;
        }

        return '';
    }

    public static function insert($data)
    {
        DB::table('users')->insert([
            'name' => $data['name'],
            'email' => $data['email'],
            'pass' => $data['pass'],
            'city' => $data['city'],
            'address' => $data['address'],
            'tel' => $data['tel'],
            'role' => $data['role'],
            'date' => $data['date']
        ]);
    }

    public static function get_user_info($type, $email)
    {
        if ($type == "email") {
            return DB::table("users")->select('users.*')->where('email', '=', $email)->get()[0];
        } else {
            return DB::table("users")->select('users.*')->where('id', '=', $email)->get()[0];
        }
    }

    public static function update_user($id, $data)
    {
        DB::table('users')->where('id', '=', $id)->update(
            [
                'name' => $data['name'],
                'tel' => $data['tel'],
                'address' => $data['address'],
                'fb' => $data['fb'],
                'insta' => $data['insta'],
                'tw' => $data['tw']
            ]
        );
    }

    public static function delete_user($id)
    {
        DB::table('users')->where('id', '=', $id)->delete();
    }

    public static function get_user_city()
    {
        $id = Request()->session()->get('ie-id');
        return DB::table("users")->select('users.city as city')->where('id', '=', $id)->get()[0];
    }

}
