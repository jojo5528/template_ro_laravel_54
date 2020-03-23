<div class="container status_server">
    <div class="row justify-content-center">
        <div class="col-lg-3 rounded shadow box">
            <h1>STATUS</h1>
            <small>SERVER</small>
            <h3><i class="fas fa-server fa-4x"></i></h3>
            <h2 class="text-success">ONLINE</h2>
        </div>
        <div class="col-lg-3 rounded shadow box">
            <h1>PLAYER</h1>
            <small>ONLINE</small>
            <h3><i class="fas fa-gamepad fa-4x"></i></h3>
            <h2 class="text-warning">{{ $count->online }}</h2>
        </div>
        <div class="col-lg-3 rounded shadow box">
            <h1>ACCOUNT</h1>
            <small>TOTAL</small>
            <h3><i class="fas fa-users fa-4x"></i></h3>
            <h2 class="text-warning">{{ $count->account }}</h2>
        </div>
    </div>
</div>