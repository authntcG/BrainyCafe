<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class MenuController extends Controller
{
    public function index() {
        $menu = DB::table('vmenu')->get();

        $category = DB::table('kategori')->get();

        return view('admin.menu', [
            'menu' => $menu,
            'kategori' => $category,
            'title' => 'Menu'
        ]);
    }

    public static function checkID() {
        $id = DB::table('menu')->selectRaw('RIGHT (id_menu, 3) AS id_menu')->orderBy('id_menu', 'desc')->limit(1)->get();

        $count = count($id);

        if ($count != null) {
            $idn = $id[0] -> id_menu;

            $a = substr($idn, -3);

            $f = $a+1;

            $final = "MN-00".$f;
        } else {
            $final = "MN-001";
        }

        return $final;
    }

    /* public static function deleteImage($id) {
        $id = DB::table('menu')->where('id_menu', $id)->get();

        $count = count($id);

        if ($count != null) {
            foreach ($id as $data) {
                $img = (String) $data -> picturl;
            }
            $filepath = (String) 'public/images/'.$img;
            $a = Storage::delete($filepath);
        }
    } */

    public static function deleteImage($id) {
        $id = DB::table('menu')->where('id_menu', $id)->get();

        $count = count($id);

        if ($count != null) {
            foreach ($id as $data) {
                $img = (String) $data -> picturl;
            }
            $filepath = public_path('/img/'.$img);
            //$a = Storage::delete($filepath);
            unlink($filepath);
        }
    }

    public function simpan(Request $request) {
        //save pict to storage folder : /storage/app/images
        $img = $request->menu_foto;
        $imgext = $request->menu_foto->extension();
        $imgname = time().'-'.self::checkID().'.'.$imgext;
        //$request->menu_foto->put('images', $imgname);
        
        //Storage::putFileAs('public/images/', $request->menu_foto, $imgname);
        $img->move(base_path('public/img'), $imgname);

        DB::table('menu')->insert([
            'id_menu'       => self::checkID(),
            'name_menu'     => $request->name_menu,
            'id_kategori'   => $request->kategori,
            'harga'         => $request->harga,
            'picturl'       => $imgname,
            'status_menu'   => $request->status
        ]);

        return redirect('/admin-area/menu');
    }

    public function edit($id) {
		#Get data from db, based on id at url
		$menuedit = DB::table('menu')->where('id_menu', decrypt($id))->get();

        $category = DB::table('kategori')->get();

		#Send result to view 
		return view('admin.menu-edit', [
            'menu' => $menuedit,
            'kategori' => $category,
            'title' => 'Menu'
        ]);
	}

    public function update(Request $request) {
        $img = $request->menu_foto;

        if ($img != null) {
            self::deleteImage($request->id);

            //save pict to storage folder : /storage/app/images
            $imgext = $request->menu_foto->extension();
            $imgname = time().'-'.$request->id.'.'.$imgext;
            //$request->menu_foto->put('images', $imgname);

            //Storage::putFileAs('public/images/', $request->menu_foto, $imgname);
            $img->move(base_path('public/img'), $imgname);

            #Update Data to DB
		    DB::table('menu')->where('id_menu', $request->id)->update([
                'name_menu'     => $request->name_menu,
                'harga'         => $request->harga,
                'id_kategori'   => $request->kategori,
                'picturl'       => $imgname,
                'status_menu'   => $request->status
            ]);
        } else {
            #Update Data to DB
            DB::table('menu')->where('id_menu', $request->id)->update([
                'name_menu'     => $request->name_menu,
                'harga'         => $request->harga,
                'id_kategori'   => $request->kategori,
                'status_menu'   => $request->status
            ]);
        }
		return redirect('/admin-area/menu');
	}

    public function delete($id) {
        self::deleteImage(decrypt($id));

        DB::table('menu')->where('id_menu', decrypt($id))->delete();

		return redirect('/admin-area/menu');
	}
}
