@extends('admin.layout.main')
@section('content')
<div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div
                    class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                    <i class="fas fa-list-alt"></i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Today's Order</p>
                    <h4 class="mb-0">{{ $torder }}</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <a class="mb-0" href="">Details</a>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div
                    class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                    <i class="fas fa-funnel-dollar"></i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Today's Revenue</p>
                    <h4 class="mb-0">{{ $revenue }}</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <a class="mb-0" href="">Details</a>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div
                    class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                    <i class="fas fa-users"></i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Users</p>
                    <h4 class="mb-0">{{ $users }}</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <a class="mb-0" href="">Details</a>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div
                    class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                    <i class="fas fa-book"></i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Menu Available</p>
                    <h4 class="mb-0">{{ $menu }}</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <a class="mb-0" href="">Details</a>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-lg-6 col-md-6 mt-4 mb-4">
        <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                    <div class="chart">
                        <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="mb-0 ">Most Ordered Menu</h6>
                <div class="d-flex ">
                    <a class="mb-0 text-sm" href="#">Details</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 mt-4 mb-4">
        <div class="card z-index-2  ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                    <div class="chart">
                        <canvas id="chart-pie" class="chart-canvas" height="170"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="mb-0 ">Complete / Pending Order</h6>
                <div class="d-flex ">
                    <a class="mb-0 text-sm" href="#">Details</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-4">
    <div class="col-lg-6 col-md-6 mb-md-0 mb-4">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6 col-7">
                        <h6>Newest Order : {{ \Carbon\Carbon::now()->format('d/m/Y') }}</h6>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID Pesanan
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Pelanggan</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Catatan Pelanggan</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($newestorder) == 0)
                            <tr>
                                <td class="align-middle" colspan="4">
                                    <div class="text-center">
                                        <h6 class="mb-0 text-sm">Pesanan Kosong!</h6>
                                    </div>
                                </td>
                            </tr>
                            @else
                            @foreach ($newestorder as $data)
                            <tr>
                                <td class="align-middle">
                                    <div class="text-center">
                                        <h6 class="mb-0 text-sm">{{ $data -> id_pesanan }}</h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="align-middle">
                                        <div class="text-center">
                                            <h6 class="mb-0 text-sm">{{ $data -> id_user }} | {{ $data -> name_user }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle text-start text-sm">
                                    @if ($data -> ket == null)
                                        <span class="text-xs font-weight-bold">Tidak Ada Keterangan.</span>                                        
                                    @else
                                        <span class="text-xs font-weight-bold">{{ $data -> ket }}</span>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    @if ($data -> status_order == 0)
                                    <div class="text-center">
                                        <h6 class="mb-0 text-sm">Pesanan Belum Dibayar</h6>
                                    </div>
                                    @elseif ($data -> status_order == 1)
                                    <div class="text-center">
                                        <h6 class="mb-0 text-sm">Pesanan Disiapkan</h6>
                                    </div>
                                    @elseif ($data -> status_order == 2)
                                    <div class="text-center">
                                        <h6 class="mb-0 text-sm">Pesanan Dikirim</h6>
                                    </div>
                                    @elseif ($data -> status_order == 3)
                                    <div class="text-center">
                                        <h6 class="mb-0 text-sm">Pesanan Telah Diterima</h6>
                                    </div>
                                    @elseif ($data -> status_order == -1)
                                    <div class="text-center">
                                        <h6 class="mb-0 text-sm">Dibatalkan</h6>
                                    </div>
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
    <div class="col-lg-6 col-md-6">
        <div class="card h-100">
            <div class="card-header pb-0">
                <h6>Orders overview</h6>
                <p class="text-sm">
                    <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                    <span class="font-weight-bold">24%</span> this month
                </p>
            </div>
            <div class="card-body p-3">
                <div class="timeline timeline-one-side">
                    <div class="timeline-block mb-3">
                        <span class="timeline-step">
                            <i class="material-icons text-success text-gradient">notifications</i>
                        </span>
                        <div class="timeline-content">
                            <h6 class="text-dark text-sm font-weight-bold mb-0">$2400, Design changes</h6>
                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 7:20 PM</p>
                        </div>
                    </div>
                    <div class="timeline-block mb-3">
                        <span class="timeline-step">
                            <i class="material-icons text-danger text-gradient">code</i>
                        </span>
                        <div class="timeline-content">
                            <h6 class="text-dark text-sm font-weight-bold mb-0">New order #1832412</h6>
                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 11 PM</p>
                        </div>
                    </div>
                    <div class="timeline-block mb-3">
                        <span class="timeline-step">
                            <i class="material-icons text-info text-gradient">shopping_cart</i>
                        </span>
                        <div class="timeline-content">
                            <h6 class="text-dark text-sm font-weight-bold mb-0">Server payments for April</h6>
                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 9:34 PM</p>
                        </div>
                    </div>
                    <div class="timeline-block mb-3">
                        <span class="timeline-step">
                            <i class="material-icons text-warning text-gradient">credit_card</i>
                        </span>
                        <div class="timeline-content">
                            <h6 class="text-dark text-sm font-weight-bold mb-0">New card added for order #4395133</h6>
                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">20 DEC 2:20 AM</p>
                        </div>
                    </div>
                    <div class="timeline-block mb-3">
                        <span class="timeline-step">
                            <i class="material-icons text-primary text-gradient">key</i>
                        </span>
                        <div class="timeline-content">
                            <h6 class="text-dark text-sm font-weight-bold mb-0">Unlock packages for development</h6>
                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">18 DEC 4:54 AM</p>
                        </div>
                    </div>
                    <div class="timeline-block">
                        <span class="timeline-step">
                            <i class="material-icons text-dark text-gradient">payments</i>
                        </span>
                        <div class="timeline-content">
                            <h6 class="text-dark text-sm font-weight-bold mb-0">New order #9583120</h6>
                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">17 DEC</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection