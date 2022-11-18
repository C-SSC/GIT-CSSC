<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\DanhMucSanPham;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomePageController extends Controller
{
    public function index()
    {
        $menuCha = DanhMucSanPham::where('id_danh_muc_cha', 0)
                                 ->where('is_open', 1)
                                 ->get();
        $menuCon = DanhMucSanPham::where('id_danh_muc_cha', '<>', 0)
                                 ->where('is_open', 1)
                                 ->get();


        foreach($menuCha as $key => $value_cha){
            $value_cha->tmp = $value_cha->id;
            foreach($menuCha as $key => $value_con){
                if($value_con->id_danh_muc_cha == $value_cha->id){
                    $value_cha->tmp = $value_cha->tmp . ',' . $value_con->id;
                }
            }
        }
        dd($menuCha->toArray());
        $config  = Config::latest()->first();

        $sql = "SELECT *, (`gia_ban` - `gia_khuyen_mai`) / `gia_ban` * 100 AS `TYLE` FROM `san_phams` ORDER BY TYLE DESC";
        $allSanPham = DB::select($sql);


        return view('home_page.pages.home_page', compact('menuCha', 'menuCon', 'config', 'allSanPham'));
    }
    public function viewSanPham(){
        return view('home_page.pages.detail_san_pham',compact('sanPham'));

    }
}
