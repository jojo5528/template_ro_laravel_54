@php
$woe = [];
@endphp

<div class="row justify-content-center text-center box-warreport p-5">
    <div class="col">
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
                <thead class="bg-danger text-white">
                    <tr>
                        <th>EMBLEM</th>
                        <th>CASTLE</th>
                        <th>GUILD</th>
                        <th>MASTER</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($woe as $item)
                        <tr>
                            <td><img src="{{ $item->guild_emblem }}" alt="{{ $item->guild_name }}" width="24" height="24"></td>
                            <td>{{ $item->castle_name }}</td>
                            <td>{{ $item->guild_name }}</td>
                            <td>{{ $item->guild_master }}</td>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="4" class="text-center text-danger"><h3>ขณะนี้ยังไม่มีรายงานผลกิลด์วอร์</h3></th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>