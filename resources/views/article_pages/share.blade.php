@extends('layouts.frontend_page')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <ol class="breadcrumb shadow bg-white">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Share</li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center my-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header text-center"><h1>Share</h1></div>
                <div class="card-body">

                    <h2 class="text-center text-danger">แก้ไข CODE ได้ที่ resources/views/article_pages/</h2>

                    <hr>

                    <h3>กรุณาใส่หมายเลขนี้ ขณะแชร์โพสต์ (ไม่ขาดไม่เกิน)</h3>
                    <p class="m-0 p-0 text-danger"><b>ข้อควรระวัง</b> หากใส่ข้อความไม่ถูกต้องตามที่เขียนไว้แล้วไม่ได้แต้ม ทางทีมงานขอสงวนสิทธิ์ไม่รับผิดชอบใดๆทั้งสิ้น</p>
                    <h4 class="alert alert-danger">
                        @auth
                            {{Auth::user()->account_id}}
                        @else
                            กรุณาเข้าสู่ระบบก่อนเล่นระบบแชร์ !
                        @endauth
                    </h4>
                    <hr>

                    <!-- ปุ่ม SHARE -->
                    <p id="fb_status" class="alert alert-info">สถานะ: none</p>
                    <p>
                        <div id="loginBtn" onclick="fb_login()" class="btn btn-lg btn-primary clearfix"><i class="fab fa-facebook"></i> LOGIN</div>
                        <div id="shareBtn" onclick="do_share()" class="btn btn-lg btn-primary clearfix"><i class="fas fa-gift"></i> SHARE</div>
                    </p>
                    <hr>

                    <!-- นโยบายการใช้ข้อมูล -->
                    <p>
                        <h3>นโยบายการใช้ข้อมูล Facebook Profile</h3>
                        <ol>
                            <li>POST - ใช้ตรวจสอบการแชร์โพสต์ของท่าน</li>
                            <li>Friend - ใช้ตรวจสอบจำนวนเพื่อนของท่าน เพื่อป้องกันแสปม</li>
                        </ol>
                    </p>

                    <!-- ข้อจำกัดและวิธีการใช้งาน -->
                    <p>
                        <h3>ข้อจำกัดและวิธีการใช้งานระบบแชร์</h3>
                        <ul>
                            <li>เนื่องด้วยปัจจุบัน Facebook API 6 ได้นำระบบ publish_action ออกไป <u class="text-danger">ทำให้ไม่สามารถตรวจสอบ Shared Post ได้อย่างสมบูรณ์</u></li>
                            <li>ขอความกรุณาผู้เล่นทุกท่าน โพสต์แชร์ลงไปด้วยข้อความที่ระบุ <u class="text-danger">ไม่ขาดไม่เกิน</u> (ข้อความจะเป็นหมายเลข account id ของท่าน)</li>
                        </ul>
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- FB APP SETTING -->
<script>
var btn_login = document.getElementById('loginBtn');
var btn_share = document.getElementById('shareBtn');
var box_status = document.getElementById('fb_status');
var game_uid = {!! json_encode(Auth::check() ? Auth::user()->account_id:0) !!};

window.fbAsyncInit = function() {
    FB.init({
        appId            : '2949654511739445',
        autoLogAppEvents : true,
        xfbml            : true,
        cookie           : true,
        version          : 'v6.0',
    });
    FB.getLoginStatus(function(response){
        fb_login_fetch(response);
    });
};

/**
 * การตั้งค่า
 * กรุณาตรวจสอบเว็บของท่าน และระบุ http หรือ https protocol ให้ถูกตั้ง มิฉะนั้นอาจเกิดข้อผิดพลาดได้
*/
/**
 * ลิงก์ที่จะแชร์ (ค่าเริ่มต้นที่นี้คือหน้าแรก url ของเว็บ ดึงการตั้งค่าจาก php มา)
 * ตัวอย่าง
 * var app_url = "http://www.google.co.th/testpath/eiei.html";
*/
var app_url = {!! json_encode(config('app.url')) !!};
/**
 * รูปที่แชร์ในโพสต์ (ค่าเริ่มต้นคือให้ระบบดึงมาครับ เลยเขียนโค้ดอีกแบบ)
 * ตัวอย่าง
 * var app_logo = "http://www.ฝากรูป.com/myimage.jpg";
*/
var app_logo = {!! json_encode(secure_asset('images/sharedfb.png')) !!};

var getUrl = window.location;
var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

function do_share(){
    if(game_uid < 1){
        Swal.fire({
            icon: 'error',
            title: 'ผิดพลาด!',
            text: 'กรุณาเข้าสู่ระบบก่อน!'
        });
        return false;
    }

    FB.api('/me', {fields: 'id,name,friends'}, data=>{
        var friends_data = null;
        if(data.friends && data.friends !== null && data.friend !== undefined){
            friends_data = data.friends.summary.total_count;
        }
        
        if(data && data.id){
            axios.post( {!! json_encode(secure_url('api/check_profile')) !!} ,{
                id: data.id,
                friend_count: (friends_data && friends_data !== null && friends_data !== undefined) ? friends_data : -1,
                game_uid: game_uid,
            }).then(res=>{
                var data = res.data;
                if(data.success){
                    fb_share(data.uid);
                }else{
                    console.log(data);
                    Swal.fire({
                        icon: 'error',
                        title: 'ผิดพลาด!',
                        text: data.msg
                    });
                }
            });
        }else{
            Swal.fire({
                icon: 'error',
                title: 'ผิดพลาด!',
                text: 'กรุณาตรวจสอบการเข้าสู่ระบบเฟซบุ๊กอีกครั้ง!'
            });
        }
    });
}
function fb_share(fb_uid){
    FB.ui({
        method: 'feed',
        link: app_url,
        picture: app_logo
    }, res=>{
        if(!res.error_code){
            fb_check_post(fb_uid);
        }
    });
}
function fb_check_post(fb_uid){
    FB.api('/me', {fields: 'posts.limit(3)'}, res=>{
        var post = null;

        if(res.posts !== null && res.posts !== undefined){
            post = res.posts.data;
        }
        
        axios.post( {!! json_encode(secure_url('api/share')) !!} ,{
            fb_uid: fb_uid,
            post: post,
            game_uid: game_uid,
        }).then(res=>{
            var data = res.data;
            if(data.success){
                Swal.fire({
                    icon: 'success',
                    title: 'สำเร็จ!',
                    text: data.msg
                });
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'ผิดพลาด!',
                    text: data.msg
                });
            }
        });
    });
}
function fb_login(){
    FB.login(function(response) {
        fb_login_fetch(response);
    }, {scope: 'user_friends,user_posts'});
}
function fb_login_fetch(response){
    btn_login.style.display = "none";
    btn_share.style.display = "none";

    if(response.status === 'connected') {
        box_status.innerHTML = "สถานะ: เข้าสู่ระบบ FACEBOOK แล้ว";
        btn_share.style.display = "inline-block";
    }else if(response.status === 'not_authorized'){
        box_status.innerHTML = "สถานะ: ไม่ได้รับการอนุญาติ";
        btn_login.style.display = "inline-block";
    }else{
        box_status.innerHTML = "สถานะ: ยังไม่ได้เข้าสู่ระบบ FACEBOOK";
        btn_login.style.display = "inline-block";
    }
}
</script>
<script async defer src="https://connect.facebook.net/en_US/sdk.js"></script>

@endsection
