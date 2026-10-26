@php
    $shareText = 'A game shop in Laravel: browse offers by category, add games to a cart, and manage the catalogue from an admin area. A portfolio demo by Francisco Cavaco.';
    $shareImage = url('/gamehaven-share.jpg?v=1');
@endphp
<meta name="description" content="{{ $shareText }}">
<meta property="og:type" content="website">
<meta property="og:site_name" content="GameHaven">
<meta property="og:title" content="GameHaven: a game shop built with Laravel">
<meta property="og:description" content="{{ $shareText }}">
<meta property="og:url" content="{{ url('/') }}">
<meta property="og:image" content="{{ $shareImage }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="GameHaven: the shop's offers page with game covers on a purple background">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="GameHaven: a game shop built with Laravel">
<meta name="twitter:description" content="{{ $shareText }}">
<meta name="twitter:image" content="{{ $shareImage }}">
<link rel="icon" href="/favicon.ico?v=2" sizes="any">
<link rel="icon" type="image/png" sizes="192x192" href="/icon-192.png?v=2">
<link rel="apple-touch-icon" href="/apple-touch-icon.png?v=2">
