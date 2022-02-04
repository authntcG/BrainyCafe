@extends('admin/layout/main')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <div class="row ps-2 pe-3">
                        <div class="col">
                            <h6 class="text-white text-capitalize ps-3">Menu table</h6>
                        </div>
                        <!--
                        <div class="col text-end">
                            <button class="btn btn-sm btn-info bg-gradient">Add Data</button>
                        </div>
                        -->
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Nama Menu
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Kategori
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Harga
                                </th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Ketersediaan
                                </th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($menu) == 0) 
                            <tr>
                                <td colspan="5" class="align-middle text-center">
                                    Tidak Ada Data!
                                </td>
                            </tr>
                            @else 
                            @foreach ($menu as $data)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 ps-3">
                                        <div>
                                            <img src="{{ asset('img/'.$data -> picturl) }}" class="avatar avatar-sm me-3 border-radius-lg" alt="user4">
                                        </div>
                                        <h6 class="mb-0 mt-1">{{ $data -> name_menu }}</h6>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-md mb-0">{{ $data -> nama_kategori }}</p>
                                </td>
                                <td>
                                    <p class="text-md mb-0">{{ $data -> harga }}</p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    @if ($data -> status_menu == "1")
                                        <span class="badge badge-sm bg-gradient-success">Tersedia</span>
                                    @else
                                        <span class="badge badge-sm bg-gradient-secondary">Habis</span>
                                    @endif
                                    
                                </td>
                                <td class="text-center">
                                    <a href="/admin-area/menu/edit/{{ Crypt::encrypt($data -> id_menu)  }}">
                                        <span class="badge badge-sm bg-gradient-warning">Edit</span>
                                    </a>
                                    <a href="/admin-area/menu/delete/{{ Crypt::encrypt($data -> id_menu)  }}">
                                        <span class="badge badge-sm bg-gradient-danger">Delete</span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
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
                    <form class="mt-0 px-4" action="/admin-area/menu/add" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group input-group-static my-3">
                                    <label>Nama Menu</label>
                                    <input type="text" class="form-control" name="name_menu">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-static my-3">
                                    <label for="select1" class="ms-0">Kategori</label>
                                    <select class="form-control" id="select1" name="kategori">
                                        @foreach ($kategori as $item)
                                        <option value="{{ $item -> id_kategori }}">{{ $item -> nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                  </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group input-group-static my-3">
                                    <label>Harga</label>
                                    <input type="number" class="form-control" name="harga">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-static my-3">
                                    <label for="select1" class="ms-0">Status Menu</label>
                                    <select class="form-control" id="select1" name="status">
                                        <option value="1">Tersedia</option>
                                        <option value="0">Habis</option>
                                    </select>
                                  </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group input-group-static my-3">
                                    <label>Input Foto</label>
                                    <input type="file" class="form-control" accept=".png, .jpg, .jpeg" name="menu_foto" onchange="loadFile(event)">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group text-center input-group-static my-0">
                                    <div class="card">
                                        <img class="card-img" id="img-view" src="#" alt="Your Input Image...">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group input-group-outline is-invalid my-3">
                                    <button class="btn btn-secondary btn-sm " type="submit">Simpan Data</button>
                                    <!-- <button class="btn btn-danger btn-sm ">Kembali</button> -->
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection