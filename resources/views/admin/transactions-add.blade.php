@extends('admin/layout/main')
@section('content')
<div class="row">
    @php
        $total = 0;
        foreach ($pesanan as $data) {
            $sum = $data -> harga * $data -> qty;
            $total = $total + $sum;
        }
    @endphp
    <div class="col-lg-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <div class="row ps-2 pe-3">
                        <div class="col">
                            <h6 class="text-white text-capitalize ps-3">Order Details</h6>
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
                                    Nama Menu
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Harga
                                </th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Jumlah Pesanan
                                </th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Total
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pesanan as $data)
                            <tr>
                                <td class="text-center">
                                    {{ $data -> name_menu }}
                                </td>
                                <td class="text-center">
                                    {{ $data -> harga }}
                                </td>
                                <td class="text-center">
                                    {{ $data -> qty }}
                                </td>
                                <td class="text-center">
                                    @php
                                    echo $data -> harga * $data -> qty;
                                    @endphp
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="text-center">Total : </td>
                                <th class="text-center">{{ $total }}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection