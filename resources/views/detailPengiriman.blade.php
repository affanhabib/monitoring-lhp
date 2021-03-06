<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard Pemantauan Laporan Hasil Pengawasan</title>

    <link rel="icon" href="{{ asset('img/BPKP_Logo.png') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>

</head>
<body>
    <div>
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: #003780">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ url('/home') }}">
                    <img src="{{ asset('img/BPKP_Logo.png') }}" alt="" width="10%" height="10%">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container py-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item"><a href="/konfirmasi-pengiriman">Laporan Terkirim</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$laporans->nama_laporan}}</li>
                </ol>
            </nav>
            <h4 class="mb-3">Konfirmasi Pengiriman Laporan</h4>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif
            <div id='map' style='width: 100%; height: 400px;'></div>
            <div class="pt-2">
                <form action="" method="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Nama Laporan</label>
                        <input type="text" class="form-control" name="namaLaporan" id="namaLaporan" value="{{$laporans->nama_laporan}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Waktu Diterima</label>
                        <input type="text" class="form-control" name="date" id="date" value="{{$laporans->updated_at}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Instansi Penerima</label>
                        <input type="text" class="form-control" name="instansiPenerima" id="instansiPenerima" value="{{$laporans->instansi_penerima}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Penerima</label>
                        <input type="text" class="form-control" name="namaPenerima" id="namaPenerima" value="{{$laporans->nama_penerima}}" readonly>
                    </div>
                    <div class="form-group">
                        <div class="col">
                            <div class="row">
                                <p>Tanda Tangan Penerima</p>
                            </div>
                            <div class="row">
                                <img src="{{ asset('image/') }}/{{$laporans->image}}" alt="" width="100%" height="100%">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows='3' readonly>{{$laporans->keterangan}}</textarea>
                    </div>
                    <a href="{{route('konfirmasi-pengiriman.index')}}" class="btn btn-primary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
    <script>
        var coordinate = <?php echo "[".$laporans->longitude.", ".$laporans->latitude."]" ?>;

        mapboxgl.accessToken = 'pk.eyJ1IjoiYWZmYW5oYWJpYjExIiwiYSI6ImNrc3pvMjR3czJlaTcyb3F6aW9zODFpZ20ifQ.-sESoz0VZ57XtcvhNsKRQg';
        var map = new mapboxgl.Map({
	        container: 'map', // container id
	        style: 'mapbox://styles/mapbox/streets-v11', // style URL
	        center: coordinate, // starting position [lng, lat]
	        zoom: 15 // starting zoom
	    });

	    map.addControl(
			new mapboxgl.GeolocateControl({
				positionOptions: {
					enableHighAccuracy: true
				},
				trackUserLocation: true
			})
		);

		map.addControl(new mapboxgl.NavigationControl());

	    var marker = new mapboxgl.Marker()
			.setLngLat(coordinate)
			.addTo(map);
    </script>
</body>
</html>
