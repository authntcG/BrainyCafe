<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public static function checkID() {
        $id = DB::table('pesanan')->selectRaw('RIGHT (id_pesanan, 3) AS id_pesanan')->orderBy('id_pesanan', 'desc')->limit(1)->get();

        $count = count($id);

        if ($count != null) {
            $idn = $id[0] -> id_pesanan;

            $a = substr($idn, -3);

            $f = $a+1;

            $final = "PSN-00".$f;
        } else {
            $final = "PSN-001";
        }

        return $final;
    }

    public static function checkIDTRX() {
        $id = DB::table('transaksi')->selectRaw('RIGHT (id_transaksi, 3) AS id_transaksi')->orderBy('id_transaksi', 'desc')->limit(1)->get();

        $count = count($id);

        if ($count != null) {
            $idn = $id[0] -> id_transaksi;

            $a = substr($idn, -3);

            $f = $a+1;

            $final = "TRX-00".$f;
        } else {
            $final = "TRX-001";
        }

        return $final;
    }

    public static function checkIDDetail() {
        $id = DB::table('detail_pesanan')->selectRaw('RIGHT (id_detail_pesanan, 3) AS id_detail_pesanan')->orderBy('id_detail_pesanan', 'desc')->limit(1)->get();

        $count = count($id);

        if ($count != null) {
            $idn = $id[0] -> id_detail_pesanan;

            $a = substr($idn, -3);

            //dd($a);

            $f = $a+1;

            $final = "DTP-00".$f;
        } else {
            $final = "DTP-001";
        }

        return $final;
    }

    public function addtocart(Request $request) {
        $check = DB::table('cart')->where('id_menu', $request->id_menu)->where('id_user', $request->id_user)->get();

        $count = count($check);

        if ($count == 0) {
            DB::table('cart')->insert([
                'id_menu'       => $request->id_menu,
                'id_user'       => $request->id_user,
                'qty'           => $request->qty,
                'ket'           => ''
            ]);
        } else {
            foreach ($check as $data) {
                $id_menu = $data -> id_menu;
                $id_user = $data -> id_user;
            }
            DB::table('cart')->where('id_menu', $request -> id_menu)->where('id_user', $request->id_user)->increment('qty', $request->qty);
        }

        return redirect('/cart/');
    }

    public function updatecart(Request $request) {
        $count = $request -> qty;
        //dd($count);
        
        if ($count > 0) {
            DB::table('cart')->where('id_menu', $request -> id_menu)->where('id_user', $request->id_user)->update([
                'qty' => $request -> qty
            ]);
        } else {
            DB::table('cart')->where('id_menu', $request -> id_menu)->where('id_user', $request->id_user)->update([
                'qty' => '1'
            ]);
            //DB::table('cart')->where('id_menu', $request -> id_menu)->where('id_user', $request->id_user)->delete();
        }

        return redirect('/cart/');
    }

    public function deletecart(Request $request) {
        DB::table('cart')->where('id_menu', $request -> id_menu)->where('id_user', $request->id_user)->delete();
        return redirect('/cart/');
    } 

    public function shopview() {
        $menu = DB::table('vmenu')->get();

        $category = DB::table('kategori')->get();

        return view('user.shop', [
            'menu' => $menu,
            'category' => $category,
            'title' => 'Shop'
        ]);
    }

    public function cartview() {
        $cart = DB::table('vcart')->get();

        return view('user.cart', [
            'cart' => $cart,
            'title' => 'Cart'
        ]);
    }

    public function checkoutview() {
        $cart = DB::table('vcart')->get();
        $bank = DB::table('virtual_account')->orderBy('name_bank', 'asc')->get();

        return view('user.checkout', [
            'cart' => $cart,
            'bank' => $bank,
            'title' => 'Cart'
        ]);
    }

    public function checkout(Request $request) {
        $cart = DB::table('vcart')->where('id_user', $request->id_user)->get();
        $idpesan = self::checkID();

        if (count($cart) != 0) {
            DB::table('pesanan')->insert([
                'id_pesanan' => $idpesan,
                'id_user' => $request -> id_user,
                'tgl_order' => Carbon::now('Asia/Jakarta'),
                'status_order' => 0,
                'ket' => $request->ket
            ]);

            foreach ($cart as $data) {
                DB::table('detail_pesanan')->insert([
                    'id_detail_pesanan' => self::checkIDDetail(),
                    'id_pesanan' => $idpesan,
                    'id_menu' => $data -> id_menu,
                    'qty' => $data -> qty,
                    'ket' => ''
                ]);
            }

            $bayar = DB::table('transaksi')->insert([
                'id_transaksi' => self::checkIDTRX(),
                'id_user' => $request -> id_user,
                'id_pesanan' => $idpesan,
                'id_va' => $request -> bank,
                'tgl_order' => Carbon::now('Asia/Jakarta'),
                'alamat' => $request -> alamat,
                'total' => $request -> total,
                'status_bayar' => '0',
                'status_kirim' => '0'
            ]);

            if ($bayar == true) {
                DB::table('cart')->where('id_user', $request -> id_user)->delete();
            }
        }

        return redirect('/history/'.Session::get('id'));
    }

    public function history($id) {
        self::checkPembayaran();

        $pesanan = DB::table('vpesanan')->where('id_user', decrypt($id))->get();
        $transaksi = DB::table('vtransaksi')->where('id_user', decrypt($id))->get();

        return view('user.history', [
            'pesanan' => $pesanan,
            'transaksi' => $transaksi
        ]);
    }

    public function shopdetailview($id) {
        $menu = DB::table('vmenu')->where('id_menu', decrypt($id))->get();

        return view('user.single-product', [
            'menu' => $menu,
            'title' => 'Detail Menu'
        ]);
    }

    public function showva($id) {
        self::checkPembayaran();

        $trx = DB::table('vtransaksi')->where('id_transaksi', decrypt($id))->get();

        if ($trx == true) {
            $id_acc = $trx[0] -> id_user;
            $id_va = $trx[0] -> id_va;
            $user = DB::table('user')->where('id_user', $id_acc)->get();
            $bank = DB::table('virtual_account')-> where('id_va', $id_va)->get();

            $code = $bank[0] -> code;
            $notel = substr($user[0] -> no_telp, 3);
            $no_va = $code.$notel;
        }

        return view('user.show-va', [
            'title' => 'Virtual Account Number',
            'trx' => $trx,
            'no_va' => $no_va
        ]);
    }

    public function pay($id) {
        $check = self::checkPembayaran();

        if ($check == '0') {
            $idtrx = decrypt($id);

            DB::table('transaksi')->where('id_transaksi', $idtrx)->update([
                'status_bayar' => '1'
            ]);

            $data = DB::table('transaksi')->where('id_transaksi', $idtrx)->get();

            $id_pesanan = $data[0] -> id_pesanan;
            DB::table('pesanan')->where('id_pesanan', $id_pesanan)->update([
                'status_order' => '1'
            ]);
        }

        return redirect('/history/'.Session::get('id'));
    }

    public function receive($id) {
        $idtrx = decrypt($id);

        DB::table('transaksi')->where('id_transaksi', $idtrx)->update([
            'status_kirim' => '2'
        ]);

        $data = DB::table('transaksi')->where('id_transaksi', $idtrx)->get();

        $idpesan = $data[0]->id_pesanan;

        DB::table('pesanan')->where('id_pesanan', $idpesan)->update([
            'status_order' => '3'
        ]);

        return redirect('/history/'.Session::get('id'));
    }

    public static function checkPembayaran() {
        $id = decrypt(Session::get('id'));

        $query = DB::table('transaksi')->where('id_user', $id)->where('status_bayar', '0')->get();

        if ($query == true) {
            foreach ($query as $data) {
                $id_transaksi = $data -> id_transaksi;
                //$date_now = Carbon::now($data -> tgl_order);
                $date_db = $data -> tgl_order;
                $date_start = Carbon::now('Asia/Jakarta');
                $date_end = Carbon::parse($date_db, 'Asia/Jakarta')->addMinutes(5);

                if ($id_transaksi) {
                    $res = $date_start->gt($date_end);

                    //dd($date_start, $date_end, $res);

                    if ($res == true) {
                        DB::table('transaksi')->where('id_transaksi', $data -> id_transaksi)->update([
                            'status_bayar' => '-1'
                        ]);

                        DB::table('pesanan')->where('id_pesanan', $data -> id_pesanan)->update([
                            'status_order' => '-1'
                        ]);

                        return '1';
                    }
                }
            }
        }

        return '0';
    }
}
