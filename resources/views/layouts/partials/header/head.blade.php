<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO -->
    <meta name="robots" content="index, follow" >
    <meta name="author" content="Albert Filella">
    <meta name="description" content="XXXXXXXX">
    <meta name="keywords" content="XXXXXXXX">

    <!-- FONTS -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,700" rel="stylesheet">

    <link rel="dns-prefetch" href="//maxcdn.bootstrapcdn.com">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- FAVICONS -->

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/images/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('/images/favicon/site.webmanifest') }}">
    <link rel="shortcut icon" href="{{ asset('/images/favicon/favicon.ico') }}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="{{ asset('/images/favicon/browserconfig.xml') }}">
    <meta name="theme-color" content="#ffffff">


    <!-- PAGE TITLE -->
    <title>@yield("title") {{ config('app.name') }}</title>

    <!-- STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=PT+Sans%7CRoboto:400,300,700%7CPermanent+Marker">
</head>