@extends('user.layout.main')
@section('content')
    
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Your</p>
						<h1>Transaction History</h1>
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
						<h4>Riwayat Pesanan</h4>
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th>ID Pesanan</th>
									<th>Tanggal Order</th>
									<th>Nama Menu</th>
									<th>Quantity</th>
									<th>Status Order</th>
								</tr>
							</thead>
							<tbody>
								@if (count($pesanan) == 0)
									<td colspan="5">No Order :(</td>
								@else
								@foreach ($pesanan as $data)
								<tr class="table-body-row">
									<td>{{ $data -> id_pesanan }}</td>
									<td>{{ $data -> tgl_order }}</td>
									<td>{{ $data -> name_menu }}</td>
									<td>{{ $data -> qty }}</td>
									<td>@if ($data -> status_order == 0)
										Pesanan belum dibayar
									@elseif ($data -> status_order == 1)
										Pesanan dalam proses
									@elseif ($data -> status_order == 2)
										Pesanan dalam pengiriman
									@elseif ($data -> status_order == 3)
										Pesanan selesai.
									@elseif ($data -> status_order == -1)
										Pesanan Dibatalkan
									@endif</td>
								</tr>
								@endforeach
								@endif
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-lg-12 col-md-12">
					<div class="cart-table-wrap">
						<h4>Riwayat Transaksi</h4>
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th>ID Transaksi</th>
									<th>ID Pesanan</th>
									<th>Tanggal Transaksi</th>
									<th>Metode Pembayaran</th>
									<th>Total</th>
									<th>Status Pembayaran</th>
								</tr>
							</thead>
							<tbody>
								@if (count($transaksi) == 0)
									<td colspan="6">No Transaction History :(</td>
								@else
								@foreach ($transaksi as $data)
								<tr class="table-body-row">
									<td>{{ $data -> id_transaksi }}</td>
									<td>{{ $data -> id_pesanan }}</td>
									<td>{{ $data -> tgl_order }}</td>
									<td>Bank {{ $data -> name_bank }}</td>
									<td>{{ $data -> total }}</td>
									<td>
										@if ($data -> status_bayar == 0)
											<a href="/show-va/{{ encrypt($data -> id_transaksi) }}" class="btn btn-primary btn-sm">Bayar</a>
										@elseif ($data -> status_bayar == 1 && $data -> status_kirim == 0)
											Pesanan Sedang Disiapkan.
										@elseif ($data -> status_bayar == 2 && $data -> status_kirim == 1)
											<a href="/receive/{{ encrypt($data -> id_transaksi) }}" class="btn btn-primary btn-sm">Terima Pesanan</a>
										@elseif ($data -> status_bayar == 2 && $data -> status_kirim == 2)
											Pesanan Selesai
										@elseif ($data -> status_bayar == -1)
											Pesanan dibatalkan
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