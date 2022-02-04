@extends('admin/layout/main')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <div class="row ps-2 pe-3">
                        <div class="col">
                            <h6 class="text-white text-capitalize ps-3">Account table</h6>
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
                                    Nama Akun
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Username
                                </th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Level Akses
                                </th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($akun as $data)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 ps-3">
                                        <h6 class="mb-0">{{ $data -> name_user }}</h6>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-md mb-0">{{ $data -> username }}</p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    @if ($data -> access_level == "1")
                                        <span class="badge badge-sm bg-gradient-success">Admin</span>
                                    @else
                                        <span class="badge badge-sm bg-gradient-secondary">User</span>
                                    @endif
                                    
                                </td>
                                <td class="text-center">
                                    <a href="/admin-area/account/edit/{{ $data -> id_user }}">
                                        <span class="badge badge-sm bg-gradient-warning">Edit</span>
                                    </a>
                                    <a href="/admin-area/account/delete/{{ $data -> id_user }}">
                                        <span class="badge badge-sm bg-gradient-danger">Delete</span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
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
                    <form class="mt-0 px-4" action="/admin-area/account/add" method="POST" >
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group input-group-static my-3">
                                    <label class="form-label">Nama Akun</label>
                                    <input type="text" class="form-control" name="name_account">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-static my-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control" name="username">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group input-group-static my-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-static mb-4">
                                    <label for="select1" class="ms-0">Hak Akses</label>
                                    <select class="form-control" id="select1" name="access">
                                        <option value="1">Administrator</option>
                                        <option value="2">User</option>
                                    </select>
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