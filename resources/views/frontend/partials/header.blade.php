<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ecommerce One</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            img {
                max-width: 100%;
                max-height: 100%;
            }
            .top-header {
                background: #549E9B;
                height: 60px;
            }
            .line-60 {
                line-height: 60px;
            }

            .bg-light {
                background-color: #5cadaa!important;
            }
            .top-header a, .top-header p, .nav-link, .navbar-brand {
                color: #fff !important;
            }
            .search-input {
                padding-top: 11px;
            }
            .search-input input {
                margin-right: 0 !important;
                background: #4a8e8b;
                border: 1px solid #3b8682 !important;
                border-radius: 4px 0px 0px 4px !important;
                color: #fff;
            }
            .search-input input::placeholder {
                margin-right: 0 !important;
                background: #4a8e8b;
                border: transparent !important;
                border-radius: 0 !important;
                color: #fff;
            }
            .form-control:focus {
                margin-right: 0 !important;
                background: #4a8e8b !important;
                border: transparent;
                border-radius: 0 !important;
                color: #fff;
            }
            .search-input input:focus, .search-input input::placeholder:focus {
                margin-right: 0 !important;
                background: #4a8e8b !important;
                border: transparent;
                border-radius: 0 !important;
                color: #fff;
            }
            .search-input button {
                background: #3b8682;
                border: 1px solid #3b8682;
                border-radius: 0px 4px 4px 0px !important;
                color: #fff;
            }

            .content-body {

                padding-top: 60px;
            }
            .category-ul {
                padding: 10px 0 0 16px !important;
            }
            .category-ul-h4, .category-ul li a{
                color: #000 !important;
            }
            .category-ul li {
                list-style: none;
                padding: 5px 0;
            }
        </style>
    </head>
    <body>
