<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset('templates/dashboard/bootstrap/css/bootstrap.min.css')}}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link type="text/css" rel="stylesheet" href="{{asset('js/dist/image-uploader.min.css')}}">
    
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <link rel="stylesheet" href="{{asset('css/homepage.css')}}">
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('css/chat.scss')}}"> -->
    <link rel="stylesheet" href="{{asset('css/fontawesome/all.min.css')}}">

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <!-- <link rel="stylesheet" type="text/css" href="slick/slick.css"/> -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" type='text/css'>
    <!-- <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/> -->

    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="{{asset('templates/dashboard/fonts/fontawesome-all.min.css')}}">
    
    <meta name="description" content="{{ $data['description'] }}">
    <meta name="keywords" content="{{ $data['keywords'] }}">
    <meta name="author" content="{{ $data['author'] }}">
    <meta name="publisher" content="Dodolanku.id">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $data['title'] }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Shareon --}}
    <link href="https://cdn.jsdelivr.net/npm/shareon@2/dist/shareon.min.css" rel="stylesheet"/>
  </head>
  <body>
