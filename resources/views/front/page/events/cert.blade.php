<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate of Achievement - {{ $data_cert['title'] }} - {{ $data_cert['serial_number'] }}</title>
    {{--
    <link rel="stylesheet" href="style.css"> --}}
</head>
<style>
    .certificate-container {
        position: absolute;
        height: 794px;
        width: 1123px;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    @page {
        margin: 0;
    }

    body {
        margin: 0;
        padding: 0;
    }

    .certificate-text {
        position: absolute;
        width: 100%;
        /* Controls text width */
        top: 20%;
        left: 50%;
        text-align: center;
        transform: translate(-50%, -50%);
        /* Adjust based on design */
    }

    #title,
    #name,
    #date {
        font-family: 'Arial', sans-serif;
        font-weight: bold;
        font-size: 1em;
        margin-bottom: 20px;
        color: #333;
    }

    .signature-box {
        position: absolute;
        left: 80px;
        /* adjust X position */
        bottom: 80px;
        /* adjust Y position */
        width: 250px;
        /* match red box width */
        text-align: center;
    }

    .signature-box img {
        width: 100%;
        height: auto;
    }

    .signature-box p {
        margin: 5px 0 0 0;
        font-family: 'Arial', sans-serif;
        font-size: 14px;
        font-weight: bold;
        color: #333;
    }

     .qrcode {
        position: absolute;
        top: 55px;      /* adjust Y */
        right: 55px;    /* adjust X */
        width: 100;   /* match red box size */
        height: auto;
    }
</style>

<body>
    <div class="certificate">
        <div class="certificate-container">
            <img src="{{ $base64 }}" alt="Certificate Background">
        </div>

        <div class="certificate-text">
            <h1>Certificate of Achievement</h1>
            <h1><span id="title">{{ $data_cert['title'] }}</span></h1>    
            <p>Published on : <span id="date">@php
                $date = Carbon\Carbon::parse($data_cert['issued_at']);
                echo $date->translatedFormat('l, d F Y');
            @endphp</span></p>
            
            <div class="user_info"
                style="margin-top: 150px; position: absolute; top: 20%; left: 50%; transform: translate(-50%, -50%);">
                <p style="font-size: 1.5em; text-align: center;">Diberikan kepada</p>
                <p style="font-size: 2em;"><span id="name">{{ $data_cert['name'] }}</span></p>
                <p>Telah mengikuti acara {{ $data_cert['title'] }} pada @php
                    $date = Carbon\Carbon::parse($data_cert['event_date']);
                    echo $date->translatedFormat('l, d F Y');
                @endphp</p>
            </div>
        </div>

        <!-- Signature + Name -->
        <div class="signature-box">
            <img src="{{ $data_cert['signature_pic'] }}" alt="Certificate Background">
            <p>{{ $data_cert['signature_name'] }}</p> <!-- replace with actual name -->
        </div>

        <!-- QR Code -->
        <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data={{ $data_cert['qrcode_url'] }}" alt="QR Code" class="qrcode">
    </div>
</body>

</html>