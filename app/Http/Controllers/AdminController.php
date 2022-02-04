<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index() {
        $date = Carbon::now();

        $todayorder = DB::table('vpesanan')->where('tgl_order', 'LIKE', $date -> toDateString().'%')->count('id_pesanan');
        $revenue = DB::table('vtransaksi')->where('tgl_order', 'LIKE', $date -> toDateString().'%')->sum('total');
        $users = DB::table('user')->where('access_level', '2')->count('id_user');
        $menu = DB::table('menu')->where('status_menu', '1')->count('id_menu');
        $ordermenu = DB::table('vordermenu')->limit(10)->orderBy('orderan', 'desc')->get();
        $completed = DB::table('pesanan')->where('status_order', '3')->count('status_order');
        $onprocess = DB::table('pesanan')->where('status_order', '2')->count('status_order');
        $failed = DB::table('pesanan')->where('status_order', '-1')->count('status_order');
        $new10order = DB::table('vpesanan')->where('tgl_order', 'LIKE', $date -> toDateString().'%')->limit(10)->orderBy('id_pesanan', 'desc')->get();

        //dd($new10order);
        
        return view('admin.index', [
            'title' => 'Beranda',
            'torder' => $todayorder,
            'revenue' => $revenue,
            'users' => $users,
            'menu' => $menu,
            'ordermenu' => $ordermenu,
            'completed' => $completed,
            'onprocess' => $onprocess,
            'failed' => $failed,
            'newestorder' => $new10order
        ]);
    }
}
