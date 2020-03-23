@php
$desc = null;
$keywords = null;
@endphp

<!-- CHARSET -->
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<!-- RESPONSIVE -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- SEO -->
<meta name="robots" content="index,follow">
@if(!empty($keywords))
    <meta name="keywords" content="{{$keywords}}">
@endif

@if(!empty($desc))
    <meta name="description" content="{{$desc}}">
    <meta property="og:description" content="{{$desc}}" />
@endif

<meta property="og:title" content="{{ config('app.name', 'Laravel') }}" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ Request::url() }}" />
<meta property="og:image" content="{{ asset('images/logo.png') }}" />
<meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}">

<title>{{config('app.name', 'Laravel')}}</title>

<!-- FAVICON -->
<link rel="apple-touch-icon" sizes="180x180" href="{{asset('apple-touch-icon.png')}}">
<link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon-32x32.png')}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon-16x16.png')}}">
<link rel="manifest" href="{{asset('site.webmanifest')}}">
