<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate</title>
    {{-- <link rel="stylesheet" href="style.css"> --}}
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
</style>

<body>
    <div class="certificate">
        <div class="certificate-container">
            {{-- <img src="{{ asset('frontend/images/cert/cert.jpg') }}" alt="Certificate Background"> --}}
            {{-- <img src="{{ url('frontend/images/cert/cert.jpg') }}" alt="Certificate Background"> --}}
            {{-- <img src="{{ public_path('frontend/images/cert/cert.jpg') }}" alt="Certificate Background"> --}}
            <img src="{{ $base64 }}" alt="Certificate Background">
            {{-- <img src="{{ base_path('public/frontend/images/cert/cert.jpg') }}" alt="Certificate Background"> --}}

        </div>
        <div class="certificate-text">
            <h1>Certificate of Achievement</h1>
            <p>Event Title : <span id="title">{{ $data_cert->title }}</span></p>
            <div class="user_info">

                <p>Presented to : <span id="name">{{ $data_cert->fullname }}</span></p>
                <p>Event Date : <span id="date">@php
                    $date = Carbon\Carbon::parse($data_cert->event_date);
                    echo $date->translatedFormat('l, d F Y');
                @endphp</span></p>
            </div>
        </div>
    </div>
</body>

</html>
