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
                @foreach ($akun as $data)
                <input type="text" hidden name="id_user" value="{{ $data -> id_user }}">
                <form class="mt-0 px-4" action="/admin-area/account/edit/update/{{ $data -> id_user }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group input-group-static my-3">
                                <label>Nama Akun</label>
                                <input type="text" class="form-control" name="name_account" value="{{ $data -> name_user }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-static my-3">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" value="{{ $data -> username }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group input-group-static my-3">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" value="{{ $data -> password }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-static my-3">
                                <label for="select1" class="ms-0">Hak Akses</label>
                                <select class="form-control" id="select1" name="access">
                                    <option value="1" @if ($data -> access_level == "1") selected @endif >Administrator</option>
                                    <option value="2" @if ($data -> access_level == "2") selected @endif>User</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group input-group-outline is-invalid my-3">
                                <button class="btn btn-secondary btn-sm " type="submit">Simpan Data</button>
                                <a class="btn btn-danger btn-sm" href="/admin-area/account">Kembali</a>
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