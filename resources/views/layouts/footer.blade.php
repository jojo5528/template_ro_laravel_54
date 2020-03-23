<footer class="page-footer pt-4">
    <div class="container text-center text-md-left">
        <div class="row px-5">
            <div class="col-md-6 mt-md-0 mt-3">
                <h5 class="text-uppercase"><i class="fas fa-splotch"></i>{{config('app.name', 'Laravel')}}</h5>
                <p>
                    แก้ไขได้ที่ resources/view/layouts/footer.blade.php
                </p>
            </div>

            <hr class="clearfix w-100 d-md-none pb-3">
            
            <div class="col-md-3 mb-md-0 mb-3">
                <h5 class="text-uppercase"><i class="fas fa-link"></i> LINKS</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('home') }}"><i class="fas fa-angle-right"></i> หน้าหลัก</a></li>
                    <li><a href="{{ route('register') }}"><i class="fas fa-angle-right"></i> สมัครสมาชิก</a></li>
                    <li><a href="{{ route('page', 'download') }}"><i class="fas fa-angle-right"></i> ดาวน์โหลด</a></li>
                    <li><a href="{{ route('page', 'info') }}"><i class="fas fa-angle-right"></i> ข้อมูลเซิฟเวอร์</a></li>
                    <li><a href="{{ route('page', 'donate') }}"><i class="fas fa-angle-right"></i> เติมเงิน</a></li>
                    <li><a href="{{ route('page', 'vote') }}"><i class="fas fa-angle-right"></i> โหวตเซิฟเวอร์</a></li>
                    <li><a href="{{ route('page', 'share') }}"><i class="fas fa-angle-right"></i> แชร์รับไอเท็ม</a></li>
                </ul>
            </div>
            
            <div class="col-md-3 mb-md-0 mb-3">
                <h5 class="text-uppercase"><i class="fab fa-facebook"></i> FANPAGE</h5>
                <div class="embed">
                    <!-- FB PAGE EMBED CODE HERE -->
                    <iframe src="https://www.facebook.com/plugins/page', 'php?href=https%3A%2F%2Fwww.facebook.com%2FrAthena.org%2F&tabs=timeline&width=340&height=500&small_header=true&adapt_container_width=true&hide_cover=true&show_facepile=true&appId=244064513267703"
                    style="border:none;overflow:hidden" scrolling="yes" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                </div>
            </div>
            
        </div>
    </div>
    
    <div class="footer-copyright text-center py-3 text-uppercase">
        <p class="p-0 m-0"><a href="#app" v-smooth-scroll class="btn btn-danger text-white"><i class="fas fa-angle-double-up fa-2x"></i></a></p>
        <p class="p-0 m-0">
            {{config('app.name', 'Laravel')}} <i class="fas fa-copyright"></i> 2020 Designed:
            <a href="https://devkurov.in.th/" target="_blank">Dev-Kurov</a>
        </p>
    </div>
</footer>