<!doctype html>
<head lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <title>@yield('title')</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description')">
    <meta name="author" content="@yield('author')">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rouge+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Recaptcha -->
    {!! htmlScriptTagJsApi() !!}

    <!-- Styles and Scripts -->
    <script src="https://cdn.tiny.cloud/1/jq49lij0jmzj925gehp1lgqshcem9zyhsw9wj4ytks8ph1j3/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <!-- Google tag (gtag.js) -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZCKSV7NVVZ"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-ZCKSV7NVVZ');
    </script>
</head>
<body style="font-family: Open Sans, sans-serif">
    <section class="pt-4 w-full">
