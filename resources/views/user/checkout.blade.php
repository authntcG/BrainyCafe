@extends('user.layout.main')
@section('content')


<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Fresh and Organic</p>
                    <h1>Check Out Product</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- check out section -->
<div class="checkout-section mt-150 mb-150">
    <div class="container">
        <div class="row">
			<div class="col col-lg-8">
                <div class="cart-table-wrap">
                    <table class="cart-table">
                        <thead class="cart-table-head">
                            <tr class="table-head-row">
                                <th class="product-name"><h6>Your order Details</h6></th>
                                <th class="product-name"><h6>Price</h6></th>
                            </tr>
                        </thead>
                        <tbody class="table-body-row">
							@php
								$total = 0;
							@endphp
							@if (count($cart) == 0)
							<tr>
                                <td colspan="2">No Data :(</td>
                            </tr>
							@else
								@foreach ($cart as $data)
								<tr>
									<td>{{ $data -> name_menu }} x{{ $data -> qty }}</td>
									<td>@php 
										$name = $data->name_user;
										echo $data -> harga * $data -> qty;
										$total = $total + ($data->harga * $data->qty);
									@endphp</td>
								</tr>
								@endforeach
							@endif
                        </tbody>
                        <tbody class="checkout-details">
                            <tr>
                                <td><h6>Total</h6></td>
                                <td><h6>{{ $total }}</h6></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="checkout-accordion-wrap">
                    <div class="accordion" id="accordionExample">
                        <div class="card single-accordion">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Billing Information
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="billing-address-form">
                                        <form action="/checkout/proses" method="POST" enctype="multipart/form-data">
											{{ csrf_field() }}
                                             <input type="hidden" name="total" value="{{ $total }}">
                                            @if (Session::get('id') != null)
                                            <input type="hidden" name="id_user" value="{{ decrypt(Session::get('id')) }}">
                                            <div class="form-group">
                                                <label for="name_acc">Nama Akun</label>
                                                <input name="name_acc" class="form-control" id="name_acc" type="text" placeholder="Nama Pengguna" readonly value="{{ decrypt(Session::get('name')) }}">
                                            </div>
                                            @else
                                            <div class="form-group">
                                                <label for="name_acc">Nama Akun</label>
                                                <input name="name_acc" class="form-control" id="name_acc" type="text" placeholder="Nama Pengguna" readonly value="">
                                            </div>
                                            @endif
                                            @if (count($cart) != 0)
                                            <div class="form-group">
                                                <label for="alamat">Alamat Pengiriman</label>
                                                <textarea name="alamat" rows="6" placeholder="Alamat Pengiriman" id="alamat" class="form-control" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="ket">Keterangan</label>
                                                <textarea name="ket" id="ket" class="form-control" placeholder="Keterangan "></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="bank">Metode Pembayaran</label>
                                                <select class="form-control" id="bank" name="bank">
                                                    @if (count($bank) != 0)
                                                        @foreach ($bank as $item)
                                                        <option value="{{ $item -> id_va }}">{{ $item -> name_bank }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Place Order</button>
                                            </div>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end check out section -->


@endsection