    @extends('user.layout.main')

    @section('content')
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
	    <div class="container">
	        <div class="row">
	            <div class="col-lg-8 offset-lg-2 text-center">
	                <div class="breadcrumb-text">
	                    <p>Fresh and Organic</p>
	                    <h1>Shop</h1>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- end breadcrumb section -->

	<!-- products -->
	<div class="product-section mt-150 mb-150">
	    <div class="container">

	        <div class="row">
	            <div class="col-md-12">
	                <div class="product-filters">
	                    <ul>
							<li class="active" data-filter="*">All</li>
							@foreach ($category as $item)
	                        <li data-filter=".{{ $item -> id_kategori }}">{{ $item -> nama_kategori }}</li>
							@endforeach
	                    </ul>
	                </div>
	            </div>
	        </div>

	        <div class="row product-lists">
				@foreach ($menu as $data)
				<div class="col-lg-4 col-md-6 text-center {{ $data -> id_kategori }}">
					<form action="/addtocart" method="POST" enctype="multipart/form-data">
						{{ csrf_field() }}
						@if (Session::get('id') != null) 
						<input type="hidden" name="id_user" value="{{ decrypt(Session::get('id')) }}">
						<input type="hidden" name="id_menu" value="{{ $data -> id_menu }}">
						@endif
						<div class="single-product-item">
							<div class="product-image">
								<a href="shop/details/{{ Crypt::encrypt($data -> id_menu); }}">
									<img src="{{ asset('img/'.$data -> picturl) }}" alt="">
								</a>
							</div>
							<h3>{{ $data -> name_menu }}</h3>
							<p class="product-price"> {{ $data -> harga }} </p>
							@if ((Session::get('id') != null || Session::get('level') != null) )
                                @if (decrypt(Session::get('level')) == 1)
									<div class="input-group input-group-rounded p-custom">
										<input type="number" disabled class="form-control round-left-input" value="1">
										<button disabled class="btn btn-cart round-right-button" type="submit"><i class="fas fa-users-cog"></i> Admin Mode</button>
									</div>
								@else
									<div class="input-group input-group-rounded p-custom">
										<input type="number" class="form-control round-left-input" value="1" name="qty">
										<button class="btn btn-cart round-right-button" type="submit"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
									</div>
								@endif
							@else 
								<div class="input-group input-group-rounded p-custom">
									<input type="number" class="form-control round-left-input" value="1">
									<a class="login-menu btn btn-cart round-right-button" href="/login"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
								</div>
							@endif
						</div>
					</form>
	            </div>
				@endforeach
	        </div>

	        <div class="row">
	            <div class="col-lg-12 text-center">
	                <div class="pagination-wrap">
	                    <ul>
	                        <li><a href="#">Prev</a></li>
	                        <li><a href="#">1</a></li>
	                        <li><a class="active" href="#">2</a></li>
	                        <li><a href="#">3</a></li>
	                        <li><a href="#">Next</a></li>
	                    </ul>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- end products -->

	@endsection
