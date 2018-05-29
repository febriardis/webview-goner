<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Web Goner</title>

		<!-- Global stylesheets -->
		<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
		<link href="/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
		<link href="/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
		<link href="/assets/css/core.css" rel="stylesheet" type="text/css">
		<link href="/assets/css/components.css" rel="stylesheet" type="text/css">
		<link href="/assets/css/colors.css" rel="stylesheet" type="text/css">
		<!-- /global stylesheets -->

		<!-- Core JS files -->
		<script type="text/javascript" src="/assets/js/plugins/loaders/pace.min.js"></script>
		<script type="text/javascript" src="/assets/js/core/libraries/jquery.min.js"></script>
		<script type="text/javascript" src="/assets/js/core/libraries/bootstrap.min.js"></script>
		<script type="text/javascript" src="/assets/js/plugins/loaders/blockui.min.js"></script>
		<!-- /core JS files -->

		<!-- Theme JS files -->
		<script type="text/javascript" src="/assets/js/plugins/forms/inputs/typeahead/handlebars.min.js"></script>
		<script type="text/javascript" src="/assets/js/plugins/forms/inputs/alpaca/alpaca.min.js"></script>
		<script type="text/javascript" src="/assets/js/plugins/forms/selects/select2.min.js"></script>
		<script type="text/javascript" src="/assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js"></script>
		<script type="text/javascript" src="/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
		<script type="text/javascript" src="/assets/js/plugins/ui/prism.min.js"></script>
		<script type="text/javascript" src="/assets/js/plugins/forms/styling/uniform.min.js"></script>

		<script type="text/javascript" src="/assets/js/core/app.js"></script>
		<script type="text/javascript" src="/assets/js/pages/alpaca_basic.js"></script>

		<script type="text/javascript" src="/assets/js/plugins/forms/selects/select2.min.js"></script>
		<script type="text/javascript" src="/assets/js/pages/form_layouts.js"></script>
		<!-- /theme JS files -->
		<style type="text/css">
			.form-control-plaintext {
			  display: block;
			  width: 100%;
			  padding-top: 0.375rem;
			  padding-bottom: 0.375rem;
			  margin-bottom: 0;
			  line-height: 1.5;
			  color: #212529;
			  background-color: transparent;
			  border: solid transparent;
			  border-width: 1px 0;
			} 
		</style>


	</head>

	<body>
	<!-- Main navbar -->
	<div class="navbar navbar-inverse" style="background-color: #2ea9c1;">
		<div class="navbar-header">
			<ul class="nav navbar-nav pull-left visible-xs-block">
				<li>@yield('btback')</li>
			</ul>
			<a class="navbar-brand" href=""><b style="font-size: 18px">Goner</b></a>
			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li>
					<a class="sidebar-control sidebar-main-toggle hidden-xs" data-popup="tooltip" title="Collapse main" data-placement="bottom" data-container="body">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main sidebar-default" style="color: #ffffff">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user" style="background-color: #4DB6AC">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="/assets/images/placeholder.jpg" class=" img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold">{{ Auth::user()->nama }}</span>
									<span class="media-heading text-size-mini">{{ Auth::user()->email }}</span>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->

					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">
								<!-- Main -->
								<li class="navigation-header"><span>Menu</span> <i class="icon-menu" title="Main pages"></i></li>
								<li><a href="/home"><i class="icon-home4"></i> <span>Home</span></a></li>
								<li><a href="/warung"><i class="icon-store"></i> <span>Warung</span></a></li>
								<li><a href="/kategori"><i class="glyphicon glyphicon-align-center"></i>  <span>Kategori</span></a></li>
								<li><a href="/tabelpesanan/{{ Auth::user()->id }}"><i class="icon-cart5"></i><span>Pesanan Saya</span></a></li>
								
								{{! $cek = (App\Warung::where('user_id', Auth::user()->id)->get())}}
								@if(count($cek)!=0)
								<ul class="navigation navigation-main navigation-accordion">
									<!-- Main -->
									<li class="navigation-header"><span>Manage Warung</span> <i class="icon-menu" title="Main pages"></i></li>
									<li><a href="/tambahkanbarang"><i class="icon-add"></i><span>Tambah Barang</span></a></li>
									<li><a href="/tabelpenjualan/{{ Auth::user()->id }}"><i class="icon-coin-dollar"></i> <span>Tabel Penjualan</span></a></li>
									<li><a href="/tabelpembeli/{{ Auth::user()->id }}"><i class="icon-cash3"></i> <span class="badge bg-warning-400">2</span> <span>Tabel Pembeli</span></a></li>
									<li><a href="/hapuswarung/{{ Auth::user()->id }}" onclick="return ConfirmDelete()"><i class="icon-subtract"></i> <span>Hapus Warung</span></a></li>
									<script>
									  	function ConfirmDelete() {
									  		var x = confirm("Yakin Akan Menghapus Warung?");
									  		if (x)
									    		return true;
									  		else
									    		return false;
									  	}
									</script>
								</ul>
								@else
									<li><a href="/tambahkanwarung"><i class="icon-store2"></i><span>Buka Warung</span></a></li>
								@endif
							</ul>
							<ul class="navigation navigation-main navigation-accordion">
								<!-- Main -->
								<li class="navigation-header"><span>Others</span> <i class="icon-menu" title="Main pages"></i></li>
								<li><a href=""><i class="icon-cog3"></i> <span>Pengaturan</span></a></li>
								<li><a href="{{ url('/keluar') }}"><i class="icon-exit"></i> <span>Keluar</span></a></li>
							</ul>
						</div>
					</div>
					<!-- /main navigation -->
				</div>
			</div>
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">
				<!-- Content area -->
				<div class="content">
					@yield('content')
				</div>
				<!-- /content area -->
			</div>
			<!-- /main content -->
			
		</div>
		<!-- /page content -->
	</div>
	<!-- /page container -->
	</body>
</html>
