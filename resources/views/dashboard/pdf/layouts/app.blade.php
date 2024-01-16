<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $judul }}</title>

    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/logo.jpg') }}" />
    <link rel="icon" type="image/png" href="{{ asset('img/logo.jpg') }}" />

    <style>
        .judul-laporan {
            text-align: center;
        }

        .table-pdf table {
            font-size: 14px;
            font-weight: bolder;
            table-layout: fixed;
            width: 60%;
        }

        .table-pdf table th, .table-pdf table td {
            text-align: left;
            border: none;
            padding: 5px 0 5px 0;
        }

        .table-pdf table tr {
            background-color: white;
        }

        .table-pdf table td {
            text-align: center;
            font-weight: normal;
        }
        .table-pdf table td:first-child {
            text-align: left;
            padding-left: 10px;
        }

        .table-pdf table tr:nth-child(odd) {
            background-color: #F3F3F3;
        }

        .table-pdf table th {
            font-size: 15px;
            font-weight: bold;
            color: white;
            background-color: #617A55;
            padding: 7px 10px;
            text-align: center;
        }

        .table-pdf table th:first-child {
            border-top-left-radius: 5px;
        }
        .table-pdf table th:last-child {
            border-top-right-radius: 5px;
        }
    </style>
</head>
<body class="font-lato antialiased font-normal text-base leading-default bg-backgroundPrimary text-greenPrimary scrollbar-thin scrollbar-thumb-greenPrimary scrollbar-track-greenPrimary/60 scrollbar-thumb-rounded-full hover:scrollbar-thumb-greenPrimary/80 transition-all">
    <main class="ease-soft-in-out xl:ml-68.5 relative h-screen rounded-xl transition-all duration-200">
        <div class="w-full px-6 py-6 mx-auto bg-backgroundPrimary">
            @yield('container')
        </div>
    </main>
</body>
</html>
