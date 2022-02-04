<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
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
        return view('admin.login', [
            'title' => 'Login',
            'msg' => ''
        ]);
    }

    public function checkLogin() {
        if (session()->get('id') != null) {
            if (decrypt(session()->get('level')) == '1') {
                return redirect('/admin-area');
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/login');
        }
    }

    public function logout() {
        session()->forget(['id', 'name', 'level']);

        session()->flush();

        return redirect('/login');
    }

    public function loginActions(Request $request) {
        $account = DB::table('user')->where('username', $request -> username)->where('password', $request -> password)->get();

        if (count($account) == null) {
            $data = "failed";
        } else {
            foreach ($account as $data) {
                $id = encrypt($data -> id_user);
                $nama = encrypt($data -> name_user);
                $access = encrypt($data -> access_level);

                $request->session()->put('id', $id);
                $request->session()->put('name', $nama);
                $request->session()->put('level', $access);

                $data = 'success';
            }
        }

        if ($data == 'success') {
            if (decrypt($access) == 1) {
                return redirect('/admin-area');
            } else {
                return redirect('/');
            }
        } else {
            return view('admin.login', [
                'title' => 'Login',
                'msg' => 'failed'
            ]);
        }
    }

    public function signup() {
        return view('admin.signup', [
            'title' => 'Sign Up',
            'msg' => ''
        ]);
    }

    public function signupactions(Request $request) {
        $checkuname = DB::table('user')->where('username', $request -> username)->get();

        if (substr($request -> no_telp, 0, 2) == '08') {
            $substr = substr($request -> no_telp, 2);
            $no_telp = '+62'.$substr;
        } else {
            $no_telp = $request -> no_telp;
        }

        if (count($checkuname) == 0) {
            $query = DB::table('user')->insert([
                'id_user'       => self::checkID(),
                'name_user'     => $request->name_account,
                'no_telp'       => $no_telp,
                'username'      => $request->username,
                'password'      => $request->password1,
                'access_level'  => '2'
            ]);
    
            return redirect('/login');
        } else {
            return view('admin.signup', [
                'title' => 'Sign Up',
                'msg' => 'username_has_taken'
            ]);            
        }
    }
}
