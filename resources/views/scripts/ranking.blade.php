<div class="row justify-content-center text-center">
    <!--VOTE-->
    <div class="col-lg-3 col-md-6">
        <table class="table table-sm table-striped table-bordered table-hover text-left">
            <thead class="text-center text-white bg-primary">
                <tr>
                    <th colspan="3"><h5>RANKING VOTE</h5></th>
                </tr>
                <tr>
                    <th>ลำดับ</th>
                    <th>ID</th>
                    <th>แต้ม</th>
                </tr>
            </thead>
            <tbody>
                @php $count=1; @endphp
                @forelse($ranking->vote as $item)
                    <tr>
                        <td>{{ $count }}</td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['point'] }}</td>
                    </tr>
                    @php $count++; @endphp
                @empty
                    <tr>
                        <th colspan="3" class="text-danger text-center"><i class="fas fa-times"></i> ขณะนี้ยังไม่มีการจัดอันดับ</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!--MVP-->
    <div class="col-lg-3 col-md-6">
        <table class="table table-sm table-striped table-bordered table-hover text-left">
            <thead class="text-center text-white bg-warning">
                <tr>
                    <th colspan="3"><h5>RANKING MVP</h5></th>
                </tr>
                <tr>
                    <th>ลำดับ</th>
                    <th>ตัวละคร</th>
                    <th>แต้ม</th>
                </tr>
            </thead>
            <tbody>
                @php $count=1; @endphp
                @forelse($ranking->mvp as $item)
                    <tr>
                        <td>{{ $count }}</td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['point'] }}</td>
                    </tr>
                    @php $count++; @endphp
                @empty
                    <tr>
                        <th colspan="3" class="text-danger text-center"><i class="fas fa-times"></i> ขณะนี้ยังไม่มีการจัดอันดับ</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!--PVP-->
    <div class="col-lg-3 col-md-6">
        <table class="table table-sm table-striped table-bordered table-hover text-left">
            <thead class="text-center text-white bg-success">
                <tr>
                    <th colspan="3"><h5>RANKING PVP</h5></th>
                </tr>
                <tr>
                    <th>ลำดับ</th>
                    <th>ตัวละคร</th>
                    <th>แต้ม</th>
                </tr>
            </thead>
            <tbody>
                @php $count=1; @endphp
                @forelse($ranking->pvp as $item)
                    <tr>
                        <td>{{ $count }}</td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['point'] }}</td>
                    </tr>
                    @php $count++; @endphp
                @empty
                    <tr>
                        <th colspan="3" class="text-danger text-center"><i class="fas fa-times"></i> ขณะนี้ยังไม่มีการจัดอันดับ</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!--SHARE-->
    <div class="col-lg-3 col-md-6">
        <table class="table table-sm table-striped table-bordered table-hover text-left">
            <thead class="text-center text-white bg-danger">
                <tr>
                    <th colspan="3"><h5>RANKING SHARE</h5></th>
                </tr>
                <tr>
                    <th>ลำดับ</th>
                    <th>ID</th>
                    <th>แต้ม</th>
                </tr>
            </thead>
            <tbody>
                @php $count=1; @endphp
                @forelse($ranking->share as $item)
                    <tr>
                        <td>{{ $count }}</td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['point'] }}</td>
                    </tr>
                    @php $count++; @endphp
                @empty
                    <tr>
                        <th colspan="3" class="text-danger text-center"><i class="fas fa-times"></i> ขณะนี้ยังไม่มีการจัดอันดับ</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>