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

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQhkowMWdixaf-9l-d7rBSNBWdK_38sGA&callback=initMap"></script>
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
                    <li class="breadcrumb-item"><a href="/daftar-pengiriman-laporan">Pengiriman Laporan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Konfirmasi Pengiriman Laporan</li>
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
                <form action="{{route('konfirmasi-pengiriman.update', $laporan->id )}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group" id="coordinates">
                        <label for="longitude">Longitude</label>
                        <input type="text" class="form-control" name="longitude" id="longitude" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="latitude">Latitude</label>
                        <input type="text" class="form-control" name="latitude" id="latitude" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Laporan</label>
                        <input type="text" class="form-control" name="namaLaporan" id="namaLaporan" value="{{$laporan->nama_laporan}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Instansi Penerima</label>
                        <input type="text" class="form-control" name="instansiPenerima" id="instansiPenerima" value="{{$laporan->instansi_penerima}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Penerima</label>
                        <input type="text" class="form-control" name="namaPenerima" id="namaPenerima" required>
                    </div>
                    <div class="form-group">
                        <label for="">Unggah Foto Tanda Tangan Terima Laporan</label>
                        <input type="file" class="form-control" id="gambarLaporan" name="gambarLaporan" accept="image/jpeg, image/png" required>
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows='3' >{{$laporan->keterangan}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Konfirmasi Pengiriman Laporan</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        // mapboxgl.accessToken = 'pk.eyJ1IjoiYWZmYW5oYWJpYjExIiwiYSI6ImNrc3pvMjR3czJlaTcyb3F6aW9zODFpZ20ifQ.-sESoz0VZ57XtcvhNsKRQg';
        // var map = new mapboxgl.Map({
	    //     container: 'map', // container id
	    //     style: 'mapbox://styles/mapbox/streets-v11', // style URL
	    //     center: [117.75715627739743, -4.80390981848582], // starting position [lng, lat]
	    //     zoom: 3 // starting zoom
	    // });

	    // map.addControl(
		// 	new mapboxgl.GeolocateControl({
		// 		positionOptions: {
		// 			enableHighAccuracy: true
		// 		},
		// 		trackUserLocation: true
		// 	})
		// );

		// var marker = new mapboxgl.Marker({
		// 	draggable: true
		// })
		// 	.setLngLat([117.75715627739743, -4.80390981848582])
		// 	.addTo(map);

		// function onDragEnd() {
		// 	var lngLat = marker.getLngLat();
		// 	coordinates.style.display = 'block';
		// 	document.getElementById('longitude').value = lngLat.lng;
		// 	document.getElementById('latitude').value = lngLat.lat;
		// }
			 
		// marker.on('dragend', onDragEnd);

		// map.addControl(new mapboxgl.NavigationControl());

		// ClassicEditor
	    //     .create( document.querySelector( '#deskripsi' ) )
	    //     .catch( error => {
	    //         console.error( error );
        // });
        x = navigator.geolocation;

        x.getCurrentPosition(success, failure);

        function success(position) {
            var myLat = position.coords.latitude;
            var myLong = position.coords.longitude;

            document.getElementById('longitude').value = myLong;
			document.getElementById('latitude').value = myLat;            

            mapboxgl.accessToken = 'pk.eyJ1IjoiYWZmYW5oYWJpYjExIiwiYSI6ImNrc3pvMjR3czJlaTcyb3F6aW9zODFpZ20ifQ.-sESoz0VZ57XtcvhNsKRQg';
            var map = new mapboxgl.Map({
                container: 'map', // container id
                style: 'mapbox://styles/mapbox/streets-v11', // style URL
                center: [myLong, myLat], // starting position [lng, lat]
                zoom: 19 // starting zoom
            });

            var marker = new mapboxgl.Marker({
                draggable: false
            })
                .setLngLat([myLong, myLat])
                .addTo(map);
        }

        function failure() {}
    </script>
</body>
</html>
