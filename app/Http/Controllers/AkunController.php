<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AkunController extends Controller
{
    public static function checkID() {
        $id = DB::table('user')->selectRaw('RIGHT (id_user, 3) AS id_user')->orderBy('id_user', 'desc')->limit(1)->get();

        $count = count($id);
        

        if ($count != null) {
            $idn = $id[0] -> id_user;

            $a = substr($idn, -3);

            $f = $a+1;

            $final = "USR-00".$f;
        } else {
            $final = "USR-001";
        }

        return $final;
    }

    public function index() {
        $akun = DB::table('user')->get();

        return view('admin.account', [
            'akun' => $akun,
            'title' => 'Akun'
        ]);
    }

    public function simpan(Request $request) {
        $query = DB::table('user')->insert([
            'id_user'       => self::checkID(),
            'name_user'     => $request->name_account,
            'username'      => $request->username,
            'password'      => $request->password,
            'access_level'  => $request->access
        ]);

        return redirect('/admin-area/account');
    }

    public function edit($id) {
		#Get data from db, based on id at url
		$akunedit = DB::table('user')->where('id_user', $id)->get();

		#Send result to view 
		return view('admin.account-edit', [
            'akun' => $akunedit,
            'title' => 'Akun'
        ]);
	}

    public function update(Request $request) {
		#Update Data to DB
		DB::table('user')->where('id_user', $request->id)->update([
			'name_user'     => $request->name_account,
            'username'      => $request->username,
            'password'      => $request->password,
            'access_level'  => $request->access
		]);

		return redirect('/admin-area/account');
	}

    public function delete($id) {
		DB::table('user')->where('id_user', $id)->delete();

		return redirect('/admin-area/account');
	}
}
