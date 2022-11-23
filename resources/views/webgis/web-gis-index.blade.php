<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Totorial GIS | Leaflet</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <link rel="stylesheet" href="{{ asset('leaflet/mini-map/Control.MiniMap.min.css') }}">
    {{--  // rules / distance  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/gokertanrisever/leaflet-ruler@master/src/leaflet-ruler.css"
        integrity="sha384-P9DABSdtEY/XDbEInD3q+PlL+BjqPCXGcF8EkhtKSfSTr/dS5PBKa9+/PMkW2xsY" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('leaflet/mouse-position/L.Control.MousePosition.css') }}">
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <style>
        #map {
            height: 800px;
        }

        .legend {
            background: white;
            padding: 18px;
        }
    </style>
</head>

<body>
    <div>
        <p>Cari Lokasi</p>
        <select class="form-control" onchange="findLocation(this.value)">
            @forelse ($locations as $location)
                <option value="{{ $location->id }}" class="form-control">{{ $location->nama }}</option>
            @empty
                <option class="form-control">Empty data</option>
            @endforelse
        </select>

        <div>
            <input type="text" name="" id="titikA">
            <input type="text" name="" id="titikB">
            <input type="text" name="" id="jalan">
        </div>
    </div>
    <div id="map"></div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('leaflet/leaflet.textpath.js') }}"></script>
<script src="{{ asset('leaflet/mini-map/Control.MiniMap.min.js') }}"></script>

//rules / distance
<script src="https://cdn.jsdelivr.net/gh/gokertanrisever/leaflet-ruler@master/src/leaflet-ruler.js"
    integrity="sha384-N2S8y7hRzXUPiepaSiUvBH1ZZ7Tc/ZfchhbPdvOE5v3aBBCIepq9l+dBJPFdo1ZJ" crossorigin="anonymous">
</script>

// hash/cursor
<script src="{{ asset('leaflet/has-and-cursor/leaflrt-hash.js') }}"></script>
<script src="{{ asset('leaflet/mouse-position/L.Control.MousePosition.js') }}"></script>
// routing machine
{{--  <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />
<script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>  --}}
<link rel="stylesheet" href="{{ asset('leaflet/routing-machine/leaflet-routing-machine.css') }}">
<script src="{{ asset('leaflet/routing-machine/leaflet-routing-machine.js') }}"></script>

<script type="text/javascript" src="{{ asset('map-leaflet.js') }}"></script>
<script type="text/javascript" src="{{ asset('leaflet/sungai.lf.js') }}"></script>


</html>
