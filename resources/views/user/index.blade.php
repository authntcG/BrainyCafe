	@extends('user.layout.main')

	@section('content')

	<!-- hero area -->
	<div class="hero-area hero-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 offset-lg-2 text-center">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							<p class="subtitle">Fresh & Original</p>
							<h1>Refreshing Coffee & Beverage For Everyone</h1>
							<div class="hero-btns">
								<a href="/shop" class="boxed-btn">Our Menu</a>
								<a href="#hot-menu" class="bordered-btn">Todays Fav's Menu</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end hero area -->

	<!-- tag for smooth scrolling -->
	<div id="hot-menu"></div>
	<!-- end tag of smooth scrolling -->

	@if (count($favmenu) == 3)
		<!-- product section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3>Todays <span class="orange-text">Fav's</span> Menu</h3>
						<p>Our TODAY HOTTEST Menu, made by our people and you.</p>
					</div>
				</div>
			</div>
			<div class="row">
				@foreach ($favmenu as $data)
				{{ csrf_field() }}
				<div class="col-lg-4 col-md-6 text-center">
					<form action="/addtocart" method="POST" enctype="multipart/form-data">
						{{ csrf_field() }}
						@if (Session::get('id') != null) 
							<input type="hidden" name="id_user" value="{{ decrypt(Session::get('id')) }}">
							<input type="hidden" name="id_menu" value="{{ $data -> id_menu }}">
						@endif
						<div class="single-product-item">
							<div class="product-image">
								<a href="shop/details/{{ Crypt::encrypt($data -> id_menu); }}"><img src="{{ asset('img/'.$data -> picturl) }}" alt=""></a>
							</div>
							<h3>{{ $data -> name_menu }}</h3>
							<p class="product-price">{{ $data -> harga }}</p>
							@if ((Session::get('id') != null || Session::get('level') != null) )
                                @if (decrypt(Session::get('level')) == 1)
								<div class="input-group input-group-rounded p-custom">
									<input type="number" class="form-control round-left-input" value="1" readonly>
									<button class="btn btn-cart round-right-button" type="button" disabled><i class="fas fa-users-cog"></i> Admin Mode</button> 
								</div>
								@else
								<div class="input-group input-group-rounded p-custom">
									<input type="number" name="qty" class="form-control round-left-input" value="1">
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
		</div>
	</div>
	<!-- end product section -->
	@endif

	<!-- testimonail-section -->
	<div class="testimonail-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3>What <span class="orange-text">they</span> said about us?</h3>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					<div class="testimonial-sliders">
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="user/assets/img/avaters/avatar1.png" alt="">
							</div>
							<div class="client-meta">
								<h3>Aceng Sudrajat <span>Tukang Cuanki</span></h3>
								<p class="testimonial-body">
									"Ngopi disini enak banget, suasananya nyaman, ada hiburan musik, bisa request lagu koplo lagi. Saking enaknya ngopi disini saya sampai lupa jualan."
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="user/assets/img/avaters/avatar2.jpg" alt="">
							</div>
							<div class="client-meta">
								<h3>Tukiyem <span>Tukang marahin kurir</span></h3>
								<p class="testimonial-body">
									"Nongkrong disini enak banget loh ibu-ibu, bisa nongkrong sepuasanya sambil marahin kurir juga loh. Kalo marahin kurir disini kan bisa sambil ngopi, jadi kalo kesel tinggal siram aja pake kopi panas ya ibu-ibu."
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="user/assets/img/avaters/avatar3.jpg" alt="">
							</div>
							<div class="client-meta">
								<h3>Bedul <span>Gamers</span></h3>
								<p class="testimonial-body">
									"WiFi-nya kenceng ya gaes, enak banget buat main epep. Jajanannya juga murah-murah kok. Aku kalo kesini paling cuma beli air putih dong, terus main epep nyampe dicariin emak."
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end testimonail-section -->
	
	<!-- advertisement section -->
	<div class="abt-section mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="abt-bg">
						<a href="https://www.youtube.com/watch?v=o-YBDTqX_ZU" class="video-play-btn popup-youtube"><i class="fas fa-play"></i></a>
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="abt-text">
						<p class="top-sub">Since Year 2018</p>
						<h2>We are <span class="orange-text">Brainy</span></h2>
						<p>Brainy Cafe is a cool place to spend time with the people closest to you. We provide the best drinks made by our experienced bartenders.</p>
						<a href="/about" class="boxed-btn mt-4">Know More</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end advertisement section -->

	@endsection