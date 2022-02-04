
    @extends('user.layout.main')

    @section('content')
    <!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>See more Details</p>
						<h1>Single Product</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- single product -->
	<div class="single-product mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<img src="{{ asset('img/'.$menu[0] -> picturl) }}" alt="">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3>{{ $menu[0] -> name_menu }}</h3>
						<p class="single-product-pricing"><span>Per Pcs</span> {{ $menu[0] -> harga }}</p>
						<div class="single-product-form">
							<form action="/addtocart" method="POST" enctype="multipart/form-data">
								{{ csrf_field() }}
								@if (Session::get('id') == null)
								<div class="input-group input-group-rounded menu-input-custom">
									<input type="number" class="form-control round-left-input" value="1">
									<a class="menu-input-custom login-menu btn btn-cart round-right-button " href="/login"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
								</div>
								@else
								<input type="hidden" name="id_user" value="{{ decrypt(Session::get('id')) }}">
								<input type="hidden" name="id_menu" value="{{ $menu[0] -> id_menu }}">
								<div class="input-group input-group-rounded menu-input-custom">
									<input name="qty" type="number" class="form-control round-left-input" value="1">
									<button class="menu-input-custom btn btn-cart round-right-button " href="/login"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
								</div>
								@endif
							</form>
							<p><strong>Categories: </strong>{{ $menu[0] -> nama_kategori }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end single product -->
    @endsection