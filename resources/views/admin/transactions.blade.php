@extends('admin/layout/main')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <div class="row ps-2 pe-3">
                        <div class="col">
                            <h6 class="text-white text-capitalize ps-3">Transactions table</h6>
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
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    ID Transaksi
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Pelanggan
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    ID Pesanan
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Tanggal Order
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Total Pembayaran
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($trans) == null)
                            <tr>
                                <td colspan="8">
                                    <div class="text-center">
                                        <h6 class="mb-0">No data available.</h6>
                                    </div>
                                </td>
                            </tr>
                            @else
                            @foreach ($trans as $data)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 ps-3">
                                        <h6 class="mb-0">{{ $data -> id_transaksi }}</h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 ps-3">
                                        <h6 class="mb-0">{{ $data -> id_user }} | {{ $data -> name_user }}</h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 ps-3">
                                        <h6 class="mb-0">{{ $data -> id_pesanan }} </h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 ps-3">
                                        <h6 class="mb-0">{{ $data -> tgl_order }}</h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 ps-3">
                                        <h6 class="mb-0">{{ $data -> total }}</h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 ps-3">
                                        @if ($data -> status_bayar == 0)
                                        <h6 class="mb-0">Pesanan Belum Dibayar</h6>
                                        @elseif ($data -> status_bayar == 1 && $data -> status_kirim == 0)
                                        <a href="/admin-area/transactions/send/{{ encrypt($data -> id_transaksi) }}" class="btn bg-gradient-secondary btn-sm" style="margin-top: 0px; margin-bottom: 0px">Kirim Pesanan</a>
                                        @elseif ($data -> status_bayar == 2 && $data -> status_kirim == 1)
                                        <h6 class="mb-0">Pesanan Dikirim</h6>
                                        @elseif ($data -> status_bayar == 2 && $data -> status_kirim == 2)
                                        <h6 class="mb-0">Pesanan Telah Diterima</h6>
                                        @elseif ($data -> status_bayar == -1)
                                        <h6 class="mb-0">Pesanan Dibatalkan</h6>
                                        @endif
                                    </div>
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