@php

/**
 * แก้คำต่างๆตรงนี้ได้เลยครับ
 * DESC = คำอธิบายเวลาแชร์เฟซ หรือค้นใน google
 * keyword = Keyword คำค้น (จริงๆไม่มีผลอะไรมากครับ จะค้นเจอหรือไม่อยู่ที่ระยะเวลาด้วย)
 * TITLE = HTML TAG TITLE ครับ
 * */

$desc = "ราคา M=500 แนวเล่นยาก ระยะยาว เล่นได้ 1 จอ";
$keywords = "ro,ragnarok,lydia-ro,lydia ro,,claasic,episode 1.5,rag เถื่อน,ro เถื่อน,ragnarok เถื่อน";
$title = "Lydia-RO :: Beta 2.0 แนวคลาสสิค เปิดเมื่อ 14/04/2563";

@endphp

<!-- CHARSET -->
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<!-- RESPONSIVE -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<!-- SEO -->
<meta name="robots" content="index,follow">
@if(!empty($keywords))
    <meta name="keywords" content="{{$keywords}}">
@endif

@if(!empty($desc))
    <meta name="description" content="{{$desc}}">
    <meta property="og:description" content="{{$desc}}">
    <meta itemprop="description" content="{{$desc}}">
@endif

@if(!empty($title))
    <title>{{ $title }}</title>
    <meta itemprop="name" content="{{ $title }}">
    <meta property="og:title" content="{{ $title }}">
@endif

<!-- FACEBOOK -->
<meta property="fb:app_id" content="2949654511739445">

<!-- IMAGE -->
<meta name="image" content="{{ secure_asset('images/sharedfb.png') }}">
<meta property="og:image" content="{{ secure_asset('images/sharedfb.png') }}">
<meta itemprop="image" content="{{ secure_asset('images/sharedfb.png') }}">

<!-- LINKS -->
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ config('app.url') }}">
<meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}">

<!-- FAVICON -->
<link rel="apple-touch-icon" sizes="180x180" href="{{ secure_asset('apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ secure_asset('favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ secure_asset('favicon-16x16.png') }}">
<link rel="manifest" href="{{ secure_asset('site.webmanifest') }}">
