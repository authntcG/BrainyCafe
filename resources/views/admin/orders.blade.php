@extends('admin/layout/main')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <div class="row ps-2 pe-3">
                        <div class="col">
                            <h6 class="text-white text-capitalize ps-3">Order table</h6>
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
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                    ID Pesanan
                                </th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                    Pelanggan
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Tanggal Order
                                </th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($order) == 0)
                            <tr>
                                <td colspan="5">
                                    <div class="text-center">
                                        <h6 class="mb-0">No data available.</h6>
                                    </div>
                                </td>
                            </tr>
                            @else
                                @foreach ($order as $data)
                                <tr>
                                    <td>
                                        <form action="/admin-area/order/details" method="POST" enctype="multipart/form-data" style="margin-bottom: -15px">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="cari" value="{{ $data -> id_pesanan }}">
                                            <h6 class="text-md mb-0 text-center">
                                                {{ $data -> id_pesanan }}
                                                <button class="btn" type="submit" style="margin: -2px 0px 0px -20px"><i class="fas fa-info-circle"></i></button>
                                            </h6>
                                        </form>
                                    </td>
                                    <td>
                                        <h6 class="text-md mb-0 text-center">{{ $data -> name_user }}</h6>
                                    </td>
                                    <td>
                                        <h6 class="text-md mb-0 text-center">{{ $data -> tgl_order }}</h6>
                                    </td>
                                    <td class="text-center">
                                        @if ($data -> status_order == 0)
                                            <h6 class="text-md mb-0 text-center">Pesanan Belum Dibayar</h6>
                                        @elseif ($data -> status_order == 1)
                                            <h6 class="text-md mb-0 text-center">Pesanan Disiapkan</h6>
                                        @elseif ($data -> status_order == 2)
                                            <h6 class="text-md mb-0 text-center">Pesanan Dikirim</h6>
                                        @elseif ($data -> status_order == 3)
                                            <h6 class="text-md mb-0 text-center">Pesanan Telah Diterima</h6>
                                        @elseif ($data -> status_order == -1)
                                            <h6 class="text-md mb-0 text-center">Pesanan Dibatalkan</h6>
                                        @endif
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
</div>
@endsection