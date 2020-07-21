<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Commercial extends Model
{
    protected $table = "commercial";
    protected $fillable = [
        'id',
        'rate',
        'title',
        'user_id',
        'description',
        'brand',
        'year',
        'price',
        'date',
        'cat_id',
        'subcat_id'
    ];

    public static function generate_id()
    {
        $id = DB::table('commercial')->select(DB::raw("MAX(id) as id"))->get()[0];
        $id = $id->id;
        if ($id == null) {
            $id = 1;
        } else {
            $id = $id + 1;
        }

        return $id;
    }

    public static function insert($data)
    {
        DB::table('commercial')->insert([
            'id' => $data['id'],
            'user_id' => $data['user_id'],
            'title' => $data['title'],
            'brand' => $data['brand'],
            'description' => $data['description'],
            'year' => $data['year'],
            'price' => $data['price'],
            'date' => $data['date'],
            'time' => $data['time'],
            'cat_id' => $data['cat_id'],
            'rate' => 0,
            'subcat_id' => $data['subcat_id'],
        ]);
    }

    public static function get_commercials_for_me($id)
    {
        return DB::table('commercial')->select('commercial.*')->where('user_id', '=', $id)->orderByRaw('date desc')->get();
    }

    public static function get_the_commercial($id)
    {
        return DB::table('commercial')->where('id', '=', $id)->get()[0];
    }

    public static function get_cat_and_subcat_for_commercial($id)
    {
        return DB::table('commercial')->where('commercial.id', '=', $id)
            ->join('category', 'commercial.cat_id', '=', 'category.id')
            ->join('sub_category', 'commercial.subcat_id', '=', 'sub_category.id')
            ->select('commercial.*', 'category.name as category', 'sub_category.name as subcategory')
            ->get()[0];
    }

    public static function delete_commercial($id)
    {
        DB::table("commercial")->where('id', '=', $id)->delete();
    }

    public static function delete_commercial_for_user($id)
    {
        DB::table('commercial')->where('user_id', '=', $id)->delete();
    }

    public static function update_me($data)
    {
        DB::table('commercial')->where('id', '=', $data["id"])->update([
            'title' => $data["title"],
            'description' => $data["description"],
            'price' => $data["price"],
            'year' => $data["year"],
            'brand' => $data["brand"]
        ]);

    }

    public static function apply_commercial_filter()
    {
        $user_id = Request()->session()->get('ie-id');
        return DB::table("commercial")->where('user_id', '!=', $user_id)
            ->join('users', 'commercial.user_id', '=', 'users.id')
            ->select('commercial.*', 'users.city as city')
            ->where(function ($query) {

                $cat = str_replace(array('"', "'", "#"), "", Request()->input('gls'));
                $subCat = str_replace(array('"', "'", "#"), "", Request()->input('vtq'));
                $date = str_replace(array('"', "'", "#"), "", Request()->input('fee'));
                $brand = str_replace(array('"', "'", "#"), "", Request()->input('brd'));
                $year = str_replace(array('"', "'", "#"), "", Request()->input('yrr'));
                $city = str_replace(array('"', "'", "#"), "", Request()->input('xaa'));
                $city = ($city == "" || $city == 0) ? 8 : $city;
                $price_s = str_replace(array('"', "'", "#"), "", Request()->input('dsp'));
                $price_e = str_replace(array('"', "'", "#"), "", Request()->input('esp'));

                //  Category

                if ($cat != '' && $cat != 0 && $cat != null) {
                    $query->where('cat_id', '=', intval($cat));
                }

                //  SubCategory
                if ($subCat != '' && $subCat != 0 && $subCat != null) {
                    $query->where('subcat_id', '=', intval($subCat));
                }
                //  Date
                if ($date != '' && $date != 0 && $date != null) {
                    try {
                        $date = explode('/', $date);
                        $date = jalali_to_gregorian($date[0], $date[1], $date[2], '-');
                        $query->where('commercial.date', '>=', $date);
                    } catch (\Exception $e) {
                    }
                }

                //  Brand
                if ($brand != '' && $brand != null) {
                    $query->where('commercial.brand', 'like', '%' . $brand . '%');
                }

                //  Year
                if ($year != '' && $year != 0 && $year != null) {
                    $query->where('year', '>=', intval($year));
                }
                //  City
                if ($city != '' && $city != 0 && $city != null) {
                    $query->where('city', '=', $city);
                }
                //  Min Price
                if ($price_s != '' && $price_s != 0 && $price_s != null) {
                    $query->where('price', '>=', $price_s);
                }
                //  Max Price
                if ($price_e != '' && $price_e != 0 && $price_e != null) {
                    $query->where('price', '<=', $price_e);
                }
            })->orderByRaw('date desc')->get();

    }

    public static function increment_com_rate($id)
    {
        DB::table('commercial')->where('id', '=', $id)->increment('rate');
    }

    public static function conform_commercial_for_user($user_id, $com_id)
    {
        $res = DB::table('commercial')->select('id')->where('id', '=', $com_id)->where('user_id', '=', $user_id)->get();

        if (count($res) > 0) {
            return true;
        }
        return false;
    }

    public static function get_commercial_rate()
    {
        $today = date("Y-m-d");
        $last_month = date("Y-m-d", strtotime("-1 month"));

        $res = DB::table('commercial')->select(DB::raw('COUNT(id) as coms'), 'date')
            ->groupBy('date')
            ->where('date', '<=', $today)
            ->where('date', '>=', $last_month)
            ->orderByRaw('date asc')
            ->get();
        $result = [];
        for ($i = 0; $i <= 31; $i++)
            $result[$i] = 0;
        if (count($res) > 0) {
            foreach ($res as $re) {
                $date = $re->date;
                $date = strtotime($date);
                $today = time();
                $diff = ($today - $date) / 86400;
                $diff = intval(floor($diff));
                $result[$diff] = $re->coms;
            }
        }

        $answer = "";
        for ($i = 0; $i <= 31; $i++) {
            $answer .= $result[$i];
            if ($i != 31)
                $answer .= ',';
        }

        return $answer;

    }

    public static function get_category_count($id)
    {
        return DB::table("commercial")->select(DB::raw('COUNT(id) as cats'))->where('cat_id', '=', $id)->get()[0];
    }

    public static function get_subcat_count($id)
    {
        return DB::table("commercial")->select(DB::raw('COUNT(id) as subcats'))->where('subcat_id', '=', $id)->get()[0];
    }

    public static function get_commercial_count()
    {
        return DB::table("commercial")->select(DB::raw("COUNT(id) as coms"))->get()[0];
    }






}
