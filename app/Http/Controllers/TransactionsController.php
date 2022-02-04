<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionsController extends Controller
{
    public static function checkID() {
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

    public function index() {
        $trx = DB::table('vtransaksi')->get();
        
        return view('admin.transactions', [
            'trans' => $trx,
            'title' => 'Transactions'
        ]);
    }

    public function bayarpesanan(Request $request) {
        $pesan = DB::table('vpesanan')->where('id_pesanan', $request -> cari)->get();

        if (count($pesan) == 0) {
            return redirect('admin-area/transactions');
        } else {
            return view('admin.transactions-add', [
                'title' => 'Orders',
                'pesanan' => $pesan
            ]);
        }
    }

    public function orderbatal($id) {
        DB::table('pesanan')->where('id_pesanan', decrypt($id))->update([
            'status_order' => '-1'
        ]);

        return redirect('admin-area/orders');
    }

    public function orderview() {
        $order = DB::table('vpesanan')->select([
            'id_pesanan',
            'id_user',
            'name_user',
            'tgl_order',
            'status_order',
            'ket'
        ])->distinct()->orderBy('id_pesanan', 'asc')->get();

        return view('admin.orders', [
            'order' => $order,
            'title' => 'Orders'
        ]);
    }

    public function prosesbayarpesanan(Request $request) {
        $bayar = DB::table('transaksi')->insert([
            'id_transaksi' => self::checkID(),
            'id_user' => $request -> id_user,
            'id_pesanan' => $request -> id_pesanan,
            'tgl_order' => $request -> tgl_order,
            'total' => $request -> total,
            'bayar' => $request -> bayar,
            'kembali' => $request -> kembali
        ]);

        if ($bayar == true) {
            $pesan = DB::table('pesanan')->where('id_user', $request -> id_user)->where('id_pesanan', $request->id_pesanan)->update([
                'status_order' => '1'
            ]);

            if ($pesan == true) {
                return redirect('admin-area/transactions');
            } else {
                #code will filled in here...
            }
        }
    }

    public function kirimbarang($id) {
        $send = DB::table('transaksi')->where('id_transaksi', decrypt($id))->update([
            'status_bayar' => '2',
            'status_kirim' => '1'
        ]);

        $data = DB::table('transaksi')->where('id_transaksi', decrypt($id))->get();
        $idpesan = $data[0] -> id_pesanan;

        $pesanan = DB::table('pesanan')->where('id_pesanan', $idpesan)->update([
            'status_order' => '2'
        ]);

        return redirect('/admin-area/transactions');
    }
}
