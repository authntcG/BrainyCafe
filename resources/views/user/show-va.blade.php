@extends('user.layout.main')
@section('content')

    
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Your</p>
						<h1>Virtual Account Number</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- cart -->
	<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th>ID Transaksi</th>
									<th>Nama Pengguna</th>
									<th>Tanggal Order</th>
									<th>Bank</th>
									<th>No Virtual Account</th>
									<th>Valid Until</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@if (count($trx) == 0)
									<td colspan="5">No Order :(</td>
								@else
								@php 
								$date = 0;
								$compare = false;
								@endphp
								@foreach ($trx as $data)
								<tr class="table-body-row">
									<td>{{ $data -> id_transaksi }}</td>
									<td>{{ $data -> name_user }}</td>
									<td>{{ $data -> tgl_order }}</td>
									<td>{{ $data -> name_bank }}</td>
									<td>{{ $no_va }}</td>
									<td>{{ $date = \Carbon\Carbon::parse($data -> tgl_order, 'Asia/Jakarta')->addMinutes(5); }}</td>
									@php $compare = \Carbon\Carbon::now('Asia/Jakarta')->gt($date) @endphp
									<td>
										@if ($compare == false)
										<a href="/show-va/pay/{{ encrypt($data -> id_transaksi) }}" class="btn btn-primary ">Bayar</a>
										@else
										Pesanan dibatalkan karena <br> tenggat waktu telah habis
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
	<!-- end cart -->

@endsection