<!doctype html>
<html lang="id">
<head>
    <title>Face Recognition</title>
    <style>
        /* container */
        .three-columns-grid {
            display: grid;
            grid-auto-rows: 1fr;
            grid-template-columns: 1fr 1fr 1fr;
        }

        /* columns */
        .three-columns-grid > * {
            padding:1rem;
            /*border: #0a53be 1px solid;*/
        }
    </style>
</head>
<body>
    <main>
        <div class="three-columns-grid">
            <div>
                <img src="{{$data->appointment->visitor->picture}}" alt="ersalomo" width="400vw" height="300vh" />
            </div>
            <div>
                <h2>Detail Kunjungan</h2>
                <p>Nama: {{$data->appointment->visitor->firstname}}</p>
                <p>Visitation Data: Wednesday 10.00 WIB</p>
                <p>Bertemu dengan: {{__($data->appointment->visitor->firstname)}}</p>
                <p>Created at : Senin 13.00 WIB</p>
                <p>Approved at : Senin 17.00 WIB</p>
                <p>Perusahaan : PT. Selalu Bisa Mandiri</p>
                <p>Tujuan : {{_($data->appointment->purpose)}}</p>
                <h2>Teman Berkunjung (opional)</h2>
                <p>Nama: Herman</p>
                <p>Nama: Herlina</p>
                <p>Nama: Sphia</p>
            </div>
            <div style="align-items: center; justify-content: center">
                <img src="/storage/icons/checkmark.gif" alt="ersalomo" width="400vw" height="400vh" />
                <p>Checkin: Rabu 09.45 WIB </p>
            </div>
        </div>
    </main>
</body>
</html>
