@extends('admin/layout/main')
@section('content')
<div class="row">
    <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <div class="row ps-2 pe-3">
                    <div class="col">
                        <h6 class="text-white text-capitalize ps-3">New Data</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
                @foreach ($menu as $data)
                <input type="text" hidden name="id_menu" value="{{ $data -> id_menu }}">
                <form class="mt-0 px-4" action="/admin-area/menu/edit/update/{{ $data -> id_menu }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group input-group-static my-3">
                                <label>Nama Menu</label>
                                <input type="text" class="form-control" name="name_menu" value="{{ $data -> name_menu }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-static my-3">
                                <label for="select1" class="ms-0">Kategori</label>
                                <select class="form-control" id="select1" name="kategori">
                                    @foreach ($kategori as $item)
                                    <option value="{{ $item -> id_kategori }}" @if ($data -> id_kategori == $item -> id_kategori) selected @endif>{{ $item -> nama_kategori }}</option>
                                    @endforeach
                                </select>
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="input-group input-group-static my-3">
                                <label>Foto</label>
                                <div class="card ms-2">
                                    <img class="card-img" id="img-view" src="{{ asset('storage/images/'.$data -> picturl) }}" alt="Card image">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group input-group-static my-3">
                                <label>Ganti Foto (Jika Diperlukan)</label>
                                <input type="file" class="form-control" accept=".png, .jpg, .jpeg" name="menu_foto" onchange="loadFile(event)">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group input-group-static my-3">
                                <label>Harga</label>
                                <input type="text" class="form-control" name="harga" value="{{ $data -> harga }}">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="input-group input-group-static my-3">
                                <label for="select1" class="ms-0">Status Menu</label>
                                <select class="form-control" id="select1" name="status">
                                    <option value="1" @if ($data -> status_menu == "1") selected @endif>Tersedia</option>
                                    <option value="0" @if ($data -> status_menu == "0") selected @endif>Habis</option>
                                </select>
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="input-group input-group-outline is-invalid my-3">
                                <button class="btn btn-secondary btn-sm " type="submit">Simpan Data</button>
                                <a href="/admin-area/menu" class="btn btn-danger btn-sm ">Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection