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
        width: 80%;
        /* Controls text width */
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        /* Adjust based on design */
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
            <p>Presented to: <span id="name">John Doe</span></p>
            <p>Date: <span id="date">2025-05-28</span></p>
        </div>
    </div>
</body>

</html>
