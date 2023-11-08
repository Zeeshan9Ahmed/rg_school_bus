<!DOCTYPE html>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @yield('title')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/stellarnav.min.css')}}" >
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" >
    <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet" >
    <link href="{{asset('assets/css/toastr.min.css')}}" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <style>
      .modal{
        pointer-events: none;
        }

        .modal-dialog{
            pointer-events: all;
        }
    </style>
    @yield('header-script')
  </head>
  <body>