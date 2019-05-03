<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield("title") {{ config('app.name','Revo Fish') }}</title>

<link href="{{ asset('css/admin.css') }}" rel="stylesheet">

<link rel="dns-prefetch" href="//use.fontawesome.com">
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<link rel="dns-prefetch" href="//fonts.googleapis.com">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/images/favicon/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/images/favicon/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/images/favicon/favicon-16x16.png') }}">
<link rel="manifest" href="{{ asset('/images/favicon/site.webmanifest') }}">
<link rel="shortcut icon" href="{{ asset('/images/favicon/favicon.ico') }}">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-config" content="{{ asset('/images/favicon/browserconfig.xml') }}">
<meta name="theme-color" content="#ffffff">