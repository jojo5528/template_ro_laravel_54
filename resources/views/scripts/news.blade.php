<!--TOPIC-->
<div class="row justify-content-center">
    <div class="col-md-6 text-center">
        <h1 class="text-center">
            <i class="fas fa-rss-square fa-2x text-warning"></i>
            NEWS UPDATE
        </h1>
    </div>
</div>

<hr>

<!--NEWS-->
@php
/*
TYPE
1 = NEWS
2 = EVENT
3 = PROMOTION

name จะอ้างอิงถึงไฟล์ resources/view/articles_news/ชื่อไฟล์.blade.php

img จะอ้างอิงถึง url รูป
กรณีเอารูปไว้ใน public/images/ ก็ใส่เป็น
'img'=>asset('images/ชื่อรูป.นามสกุลรูป'),
ใส่ path ให้ถูกต้องหลัง public/ นั่นเอง

title จะเป็นหัวข้อที่แสดงในหน้าแรก

การแก้ view ทำได้โดยไปที่
resources/views/article_news/ชื่อไฟล์อ้างอิง.blade.php
แล้วแก้ html code ด้านในได้เลย (เป็นโครงสร้างภาษา blade php)
*/
$news = [
    [
        'name'=>'news_1', 'title'=>'แก้ไขได้ที่ resources/views/scripts/news.blade.php',
        'type'=>1, 'img'=>'https://place-hold.it/900x471'
    ],
    [
        'name'=>'news_2', 'title'=>'แก้ไขได้ที่ resources/views/scripts/news.blade.php',
        'type'=>1, 'img'=>'https://place-hold.it/900x471'
    ],
    [
        'name'=>'news_3', 'title'=>'แก้ไขได้ที่ resources/views/scripts/news.blade.php',
        'type'=>2, 'img'=>'https://place-hold.it/900x471'
    ],
    [
        'name'=>'news_4', 'title'=>'แก้ไขได้ที่ resources/views/scripts/news.blade.php',
        'type'=>2, 'img'=>'https://place-hold.it/900x471'
    ],
    [
        'name'=>'news_5', 'title'=>'แก้ไขได้ที่ resources/views/scripts/news.blade.php',
        'type'=>3, 'img'=>'https://place-hold.it/900x471'
    ],
    [
        'name'=>'news_6', 'title'=>'แก้ไขได้ที่ resources/views/scripts/news.blade.php',
        'type'=>3, 'img'=>'https://place-hold.it/900x471'
    ],
];
@endphp

<div class="row">
    <!--NEWS ITEM-->
    @forelse ($news as $item)
        <div class="col-md-4 my-1">
            <div class="card">
                <a href="{{ route('news', $item['name']) }}" target="_blank">
                    <img class="card-img-top newslogo" src="https://place-hold.it/900x471" alt="NEWS">
                </a>
                <div class="card-body">
                    <h5 class="card-title">
                        @php
                            switch($item['type']){
                                case 2: echo '<b class="badge badge-pill text-white badge-success">EVENT</b>';
                                    break;
                                case 3: echo '<b class="badge badge-pill text-white badge-primary">PROMOTION</b>';
                                    break;
                                default: echo '<b class="badge badge-pill text-white badge-warning">NEWS</b>';
                                    break;
                            }
                        @endphp
                    </h5>
                    <h5 class="card-title">{{$item['title']}}</h5>
                    <hr>
                    <a href="{{ route('news', $item['name']) }}" target="_blank" class="btn btn-primary btn-block">
                        <i class="fas fa-hand-point-right"></i> READ <i class="fas fa-hand-point-left"></i>
                    </a>
                </div>
            </div>
        </div>
    @empty
        <div class="col my-1">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-danger text-center">ขณะนี้ยังไม่มีข่าวสาร</h1>
                </div>
            </div>
        </div>
    @endforelse
</div>