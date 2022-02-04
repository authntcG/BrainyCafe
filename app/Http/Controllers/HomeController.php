<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $favmenu = DB::table('vfavorit')->get();

        return view('user.index', [
            'title' => 'Home',
            'favmenu' => $favmenu
        ]);
    }
}
