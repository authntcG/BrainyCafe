@extends('user.layout.main')
@section('content')

    
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fresh and Organic</p>
						<h1>Cart</h1>
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
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-remove"></th>
									<th class="product-image">Product Image</th>
									<th class="product-name">Name</th>
									<th class="product-price">Price</th>
									<th class="product-quantity">Quantity</th>
								</tr>
							</thead>
							<tbody>
								@php
								$total = 0;
								$qtytot = 0;
								@endphp
								@if (count($cart) == 0) 
								<tr>
									<td colspan="6" class="align-middle text-center">
										Your Cart Is Empty :(
									</td>
								</tr>
								@else 
								@foreach ($cart as $data)
								@php
									$total = $total + ($data->harga * $data->qty);
									$qtytot = $qtytot + $data -> qty;
								@endphp	
								<tr class="table-body-row">
									<form action="/deletecart" method="POST">
										{{ csrf_field() }}
										<input type="hidden" name="id_user" value="{{ $data -> id_user }}">
										<input type="hidden" name="id_menu" value="{{ $data -> id_menu }}">
										<td class="product-remove"><button type="submit" class="btn"><i class="far fa-window-close"></i></button></td>
									</form>
									<td class="product-image"><img src="{{ asset('img/'.$data -> picturl) }}" alt=""></td>
									<td class="product-name">{{ $data -> name_menu }}</td>
									<td class="product-price">{{ $data -> harga }}</td>
									<form action="/updatecart" method="POST">
										{{ csrf_field() }}
										<td class="product-quantity">
											<input type="hidden" name="id_user" value="{{ $data -> id_user }}">
											<input type="hidden" name="id_menu" value="{{ $data -> id_menu }}">
											<input type="hidden" name="qty_now" value="{{ $data -> qty }}">
											<input type="number" placeholder="0" name="qty" value="{{ $data -> qty }}">
											<button class="btn" type="submit"><i class="fas fa-arrow-up"></i></button>
										</td>
									</form>
								</tr>
								@endforeach
								@endif
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
								<tr class="total-data">
									<td><strong>Total Barang: </strong></td>
									<td>{{ $qtytot }}</td>
								</tr>
								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td>{{ $total }}</td>
								</tr>
							</tbody>
						</table>
						<div class="cart-buttons">
							<a href="/cart" class="boxed-btn">Update Cart</a>
							@if ($total != 0)
							<a href="/checkout" class="boxed-btn black">Check Out</a>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end cart -->

@endsection