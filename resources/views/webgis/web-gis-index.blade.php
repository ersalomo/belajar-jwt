<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Totorial GIS | Leaflet</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <style>
        #map {
            height: 800px;
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
    </div>
    <div id="map"></div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('map-leaflet.js') }}"></script>
<script type="text/javascript" src="{{ asset('leaflet/leaflet.textpath.js') }}"></script>
<script type="text/javascript" src="{{ asset('leaflet/sungai.lf.js') }}"></script>

</html>
