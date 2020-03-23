@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <ol class="breadcrumb shadow bg-white">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('manage.dashboard')}}">Manage</a></li>
                <li class="breadcrumb-item active">Guide</li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center my-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header text-center"><h1>Manage - Guide</h1></div>
                <div class="card-body">
                    <p>
                        <a href="{{route('manage.dashboard')}}" class="btn btn-lg btn-dark"><i class="fas fa-angle-left"></i> DASHBOARD</a>
                    </p>
                    <hr class="border-dark">

                    <h2 class="text-info">CRUD APP</h2>
                    <div class="pl-md-5">
                        <p class="m-0">คือ website application ที่มีความสามารถ(function) ในการทำงานกับข้อมูลใน database ได้แก่ CREATE,READ,UPDATE,DELETE</p>
                        <p class="m-0 text-danger">*หมายเหตุ: เว็บไซต์นี้ไม่ได้จัดทำระบบมาเพื่อ UPLOAD ไฟล์และรูปภาพใดๆ ดังนั้นการใส่รูปภาพในบทความต่างๆ สามารถทำได้โดยการอ้างอิง URL ที่อัพโหลดจากเว็บฝากไฟล์อื่นๆ</p>
                    </div>
                    <hr>

                    <h2 class="text-primary" id="title">LOGO & FAVICON & TITLE SERVER NAME</h2>
                    <div class="pl-md-5">
                        <h3>LOGO</h3>
                        <p class="m-0 pl-md-5">การแก้ไข LOGO สามารถนำไฟล์รูป ไปใส่ไว้ใน <b class="badge badge-danger">/public/images/</b> ได้เลย <b class="text-success">(แนะนำรูปขนาด w-500*h-300 pixels)</b></p>
                        <p>และสามารถแก้ไขชื่อไฟล์ใน <b class="badge badge-danger">/config/app.php <i class="fas fa-angle-double-right"></i> logo</b> ได้เลย</p>
                        
                        <h3>FAV ICON</h3>
                        <p class="m-0 pl-md-5">
                            แนะนำให้แปลงรูปโดยใช้เว็บ
                            <a href="https://favicon.io/favicon-converter/" target="_blank" class="btn btn-dark btn-sm rounded-0"><i class="fas fa-link"></i> favicon.io</a>
                            จากนั้นดาวน์โหลดและแตกไฟล์นำมาทับของเดิมได้เลย ในโฟลเดอร์ <b class="badge badge-danger">/public/</b>
                        </p>
                        <p>และสามารถแก้ไข CODE เองได้ที่ <b class="badge badge-danger">/resources/views/layouts/seo.blade.php</b></p>

                        <h3>TITLE SERVER NAME</h3>
                        <p class="pl-md-5">
                            สามารถแก้ไขได้ที่ <b class="badge badge-danger">APP_NAME</b> ในส่วนของ
                            <a href="#manual" class="btn btn-dark btn-sm rounded-0" v-smooth-scroll><i class="fas fa-link"></i> MANUAL CONFIG</a>
                        </p>
                    </div>
                    <hr>

                    <h2 class="text-primary">FACEBOOK GROUP & FANPAGE</h2>
                    <div class="pl-md-5">
                        <h3>FB GROUP</h3>
                        <p class="pl-md-5">
                            สามารถแก้ไขได้ที่ <b class="badge badge-danger">APP_FB_GROUP_URL</b> ในส่วนของ
                            <a href="#manual" class="btn btn-dark btn-sm rounded-0" v-smooth-scroll><i class="fas fa-link"></i> MANUAL CONFIG</a>
                        </p>

                        <h3>FB FANPAGE</h3>
                        <p class="pl-md-5">
                            สามารถแก้ไข EMBED CODE ได้ที่ <b class="badge badge-danger">/resources/views/layouts/footer.blade.php</b> ได้เลย
                        </p>
                    </div>
                    <hr>

                    <h2>NEWS ARTICLE</h2>
                    <div class="pl-md-5">
                        <p class="m-0">
                            CRUD APP สำหรับจัดการข่าวสารหน้าเว็บไซต์ ซึ่งสามารถกดเข้าไปดูเนื้อหาทางด้านในได้<br>
                            หรือจะกำหนด URL ลิงค์ข่าวสารให้เปิดไปที่อื่นได้โดยมีส่วนประกอบหลักดังนี้
                        </p>
                        <ul>
                            <li class="text-danger">ID หมายถึง รหัสอ้างอิงข้อมูลในฐานข้อมูล (ไม่สามารถแก้ไขได้)</li>
                            <li class="text-danger">IMAGE_URL หมายถึง URL รูปภาพของบทความ (ต้องมี, ฝากรูปที่เว็บฝากรูปอื่นๆ)</li>
                            <li class="text-danger">LINK_URL หมายถึง URL ที่ต้องการลิงค์ไป (ถ้ามี) หากไม่มีก็ให้เว้นว่างค่านี้ไว้</li>
                            <li>TITLE หมายถึง หัวข้อบทความ</li>
                            <li>DESC หมายถึง คำอธิบายหรือเนื้อหาด้านใน โดยมี HTML Editor ให้สามารถแก้ไขได้อย่างง่ายดาย</li>
                        </ul>
                    </div>
                    <hr>

                    <h2>PAGE ARTICLE</h2>
                    <div class="pl-md-5">
                        <p class="m-0 text-danger">*หากไม่มีความรู้ HTML,CSS,PHP,Laravel ไม่ควรแก้ด้วยตนเองแบบ Manual จึงได้จัดทำระบบนี้ขึ้นมา</p>
                        <p class="m-0">CRUD APP สำหรับจัดการเนื้อหาหน้าต่างๆในเว็บ ซึ่งเข้าถึงจากเมนูหน้าต่างๆ โดยมีส่วนประกอบหลักดังนี้</p>
                        <ul>
                            <li class="text-danger">ID หมายถึง รหัสอ้างอิงข้อมูลในฐานข้อมูล (ไม่สามารถแก้ไขได้)</li>
                            <li class="text-danger">NAME หมายถึง ชื่ออ้างอิงของหน้าเว็บเพจเมนูนั้นๆ (ไม่ควรแก้ไขด้วยตนเอง)</li>
                            <li>HTMl หมายถึง คำอธิบายหรือเนื้อหาด้านใน โดยจะมี HTML Editor ให้สามารถแก้ไขได้อย่างง่ายดาย</li>
                        </ul>
                    </div>
                    <hr>

                    <h2>SITE CONFIG</h2>
                    <div class="pl-md-5">
                        <p class="m-0 text-danger">*หากไม่มีความรู้ HTML,CSS,PHP,Laravel ไม่ควรแก้ด้วยตนเองแบบ Manual จึงได้จัดทำระบบนี้ขึ้นมา</p>
                        <p class="m-0">CRUD APP สำหรับจัดการข้อมูลเกี่ยวกับเว็บนี้รวมไปถึง SEO โดยมีส่วนประกอบหลักดังนี้</p>
                        <ul>
                            <li class="text-danger">ID หมายถึง รหัสอ้างอิงข้อมูลในฐานข้อมูล (ไม่สามารถแก้ไขได้)</li>
                            <li class="text-danger">NAME หมายถึง ชื่ออ้างอิงของการตั้งค่า (ไม่ควรแก้ไขด้วยตนเอง)</li>
                            <li>DESC หมายถึง คำอธิบายสำหรับการตั้งค่านั้นๆ</li>
                            <li>VALUE หมายถึง ค่าของการตั้งค่านั้นๆ</li>
                        </ul>

                        <p class="m-0">มีรายการตั้งค่าที่ <b class="text-success">สามารถแก้ไขได้</b> ดังนี้</p>
                        <ul>
                            <li>SEO-Keywords หมายถึง keyword ที่ใช้ค้นหา</li>
                            <li>SEO-Description หมายถึง description คำอธิบายที่จะแสดงเวลาค้นหาเว็บไซต์</li>
                        </ul>

                        <p class="m-0">มีรายการตั้งค่าที่ <b class="text-danger">ไม่สามารถแก้ไขได้</b> ดังนี้</p>
                        <ul class="text-danger">
                            <li>
                                SEO-Title หมายถึง title ที่แสดงเวลาค้นหา ซึ่งจะเปลี่ยนตรงตาม Title ของเว็บไซต์
                                <a href="#title" class="btn btn-dark btn-sm rounded-0" v-smooth-scroll><i class="fas fa-link"></i> แก้ไข TITLE ชื่อเซิฟ</a>
                            </li>
                            <li>SEO-Url หมายถึง url ของหน้านั้น จะแปรผันตาม url ด้านบน (แก้ไขไม่ได้)</li>
                            <li>
                                SEO-Image หมายถึง image-preview ของหน้านั้น จะแสดงเวลาแชร์ลิงค์ลงบน facebook
                                <a href="#title" class="btn btn-dark btn-sm rounded-0" v-smooth-scroll><i class="fas fa-link"></i> แก้ไข LOGO</a>
                            </li>
                        </ul>
                    </div>
                    <hr>

                    <h2 class="text-danger" id="manual">MANUAL CONFIG</h2>
                    <div class="pl-md-5">
                        <p class="m-0">Environment Setting โดยมีส่วนประกอบหลักดังนี้</p>
                        <p><b class="text-danger">.env ไฟล์ที่ไม่อยู่ในโฟลเดอร์ใดๆ (หากไม่มีความรู้ ควรแก้ไขที่ระบุเฉพาะในรายการนี้)</b></p>
                        <ul>
                            <li class="text-danger">APP_ENV หมายถึง mode ของเว็บไซต์ (local / production) local=กำลังพัฒนา,ทดสอบ production=ปล่อยใช้งานจริง</li>
                            <li class="text-danger">APP_DEBUG หมายถึง mode debug ว่าต้องการแสดง error ที่เกิดขึ้นไหมถ้าหากมีระบบผิดพลาด (true = แสดง, false = ไม่แสดง)</li>
                            <hr>
                            <li>APP_NAME หมายถึง ชื่อ website หรือ title ตามที่ได้กล่าวไว้</li>
                            <li>APP_STATUS หมายถึง สถานะเซิฟตั้งค่าไว้ 3 แบบ (ONLINE / OFFLINE / MAINTENANCE) - ตั้งค่าตัวพิมพ์ใหญ่เท่านั้น</li>
                            <li>APP_URL หมายถึง URL ตั้งต้น(base url) ของเว็บไซต์ หากนำขึ้นเซิฟเวอร์จดโดเมนใดๆ ก็ให้ใส่ให้ถูกต้องรวมถึง protocol ด้วย เช่น https://www.google.com</li>
                            <li>ASSET_URL หมายถึง URL Asset ให้ใส่ตาม APP_URL ตามด้วย /public เช่น https://www.google.com/public</li>
                            <li>APP_FB_GROUP_URL หมายถึง URL Group Facebook ที่ต้องการลิงค์ไป เวลากดเมนู SOCIAL หรือ FB GROUP</li>
                            <hr>
                            <li>DB_CONNECTION หมายถึง Database ที่ใช้ (ปกติคือ mysql)</li>
                            <li>DB_HOST หมายถึง IP Host Database ที่ใช้ (หากเป็น localhost ให้ใส่ 127.0.0.1)</li>
                            <li>DB_PORT หมายถึง PORT ของ Database (mysql:3306)</li>
                            <li>DB_DATABASE หมายถึง ชื่อของ Database ที่จะเชื่อมต่อ</li>
                            <li>DB_USERNAME หมายถึง DB Username ที่ใช้เชื่อมต่อ</li>
                            <li>DB_PASSWORD หมายถึง รหัสผ่านของ DB Username</li>
                        </ul>
                        <p class="m-0"><b class="text-danger">สำหรับการตั้งค่าอื่นๆ หรือรายละเอียดเชิงลึก จะอยู่ในโฟลเดอร์ config ทั้งหมด อย่างไรก็ตามสามารถมาติดต่อขอแก้ไขต่างๆได้ฟรีไม่คิดค่าบริการเพิ่ม</b></p>
                    </div>
                    <hr>

                    <h2 class="text-danger">BUGSPOT FIX</h2>
                    <div class="pl-md-5">
                        <h3>SHARED HOSTING</h3>
                        <p class="m-0 pl-md-5">
                            หลังจากติดตั้งเว็บแล้ว ให้ตรวจสอบการตั้งค่า <b class="badge badge-danger p-2">ENV</b> ให้เรียบร้อย ให้เชื่อมฐานข้อมูลได้ จึงจะสามารถเข้าเว็บได้ครับ
                        </p>
                        <p>จากนั้นลบไฟล์ใน <b class="badge badge-danger p-2">/bootstrap/cache/</b> ทั้งหมด (เฉพาะ .php)</p>
                        
                        <h3>VPS</h3>
                        <p class="m-0 pl-md-5">หากติดตั้งบน VPS (server ส่วนตัวที่ไม่ shared port) หากพบปัญหาใดๆสามารถแจ้งได้เลยครับ</p>
                        <p>โดยเบื้องต้นให้ลบ cache ตาม SHARED HOSTING ด้วยครับ</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
