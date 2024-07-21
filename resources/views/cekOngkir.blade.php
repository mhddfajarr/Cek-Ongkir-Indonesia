<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cek Ongkir</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .hover-bg {
            transition: background-color 0.3s ease;
            transition: border-radius 0.3s ease;
            transition: box-shadow 0.3s ease;
        }
        .radius{
            border-radius: 5px;
        }
        .hover-bg:hover {
            /* background-color: #d9d9d9; 
            border-radius: 10px; */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2); 
        }
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Warna semi transparan */
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999; /* Pastikan overlay berada di atas semua elemen lainnya */
        }
        .d-none {
            display: none;
        }
    </style>
    @livewireStyles
</head>
<body>
    <livewire:ongkir>
    @livewireScripts
</body>
</html>