<?php
include 'config/app.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
          font-family: 'Space Grotesk', sans-serif;
        }
        button, .btn{
          background-color: #ADFF2F;
          color: black;
          font-size: 16px;
          /* font-weight: bold; */
          padding: 10px 20px;
          border-radius: 8px;
          cursor: pointer;
          display: inline-block;
          border: 2px solid black;
          box-shadow: 0px 4px 0px #000000;
        }
        input, .button{
          background-color: white;
          color: black;
          font-size: 16px;
          /* font-weight: bold; */
          padding: 10px 20px;
          border-radius: 8px;
          cursor: pointer;
          display: inline-block;
          border: 2px solid black;
          box-shadow: 0px 4px 0px #000000;
        }

        button:hover , .btn:hover, .button:hover{
          box-shadow: 0px 2px 0px #000000;
          transform: translateY(2px);
          transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
          transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
          transition-duration: 150ms;
        }

        button:active, input:focus {
          transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
          transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
          transition-duration: 150ms;
          box-shadow: 0px 2px 0px #000000;
          transform: translateY(2px);
        }
        .bg{
          background-image: url("bahan/Rectangle52.png");
        }
    </style>
</head>
<body>

<div class="flex items-center justify-between px-6 py-4 bg-white">
  <div class="flex items-center">
    <img src="bahan\neh.png" alt="Logo" class="h-8">
  </div>
  <div class="flex space-x-8 text-gray-800">
    <a href="#" class="hover:text-gray-600">Beranda</a>
    <a href="#" class="hover:text-gray-600">Katalog Buku</a>
    <a href="#" class="hover:text-gray-600">Kontak</a>
  </div>
  <div class="flex space-x-4">

    <button class="text-gray-800 font-medium px-6 py-2 rounded-md hover:bg-gray-100 transition">
      XI TJKT 1
    </button>
  </div>
</div>
