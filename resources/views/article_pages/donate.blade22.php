@extends('layouts.frontend_page')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <ol class="breadcrumb shadow bg-white">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Donate</li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center my-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header text-center"><h1>วิธีการสนับสนุนเซิร์ฟเวอร์</h1></div>
                <div class="card-body">
					<center><font size="5" color="blue">ก่อนทำการโอน กรุณาติดต่อ GM ก่อนทุกครั้ง และรอรับ Cash Point ภายใน 10 นาที</font></center><br>
                    <h5 class="text-center text-danger">อัตราการโอนเงินระหว่างทรูวอลเล็ต & ธนาคาร ติดต่อโอนผ่านทางธนาคารและ Wallet ได้ที่ <a href="https://facebook.com/adminsureviptips" target="_blank">Facebook</a> หรือ Line ID = woero</h5>
					
					<table class="table table-bordered" style="margin-top:20px">
								<thead>
									<tr>
									<th width="20%" class="active text-center">ราคา</th>
									<th width="20%" class="active text-center">จำนวน Cash ที่ได้รับ</th>
									<th width="30%" class="active text-center">Reward Coin</th>
									<th width="30%" class="active text-center">Reward Item</th>
									</tr> 
								</thead> 
								<tbody>
									<tr>
									<td class="text-center">50</td>
									<td class="text-center">500 + 50</td>
									<td class="text-center">50 Server Coin</td>
									<td class="text-center">Costume Box V.1 = 2 กล่อง</td>
									</tr>
									<tr>
									<td class="text-center">90</td>
									<td class="text-center">900 + 50</td>
									<td class="text-center">90 Server Coin</td>
									<td class="text-center">Costume Box V.1 = 3 กล่อง</td>
									</tr>
									<tr>
									<td class="text-center">150</td>
									<td class="text-center">1,500 + 50</td>
									<td class="text-center">150 Server Coin</td>
									<td class="text-center">Costume Box V.1 = 4 กล่อง</td>
									</tr>
									<tr>
									<td class="text-center">300</td>
									<td class="text-center">3,000 + 50</td>
									<td class="text-center">300 Server Coin</td>
									<td class="text-center">Costume Box V.1 = 5 กล่อง</td>
									</tr>
									<tr>
									<td class="text-center">500</td>
									<td class="text-center">5,000 + 50</td>
									<td class="text-center">500 Server Coin</td>
									<td class="text-center">Costume Box V.1 = 6 กล่อง</td>
									</tr>
									<tr>
									<td class="text-center">1,000</td>
									<td class="text-center">10,000 + 50</td>
									<td class="text-center">1,000 Server Coin</td>
									<td class="text-center">Costume Box V.1 = 7 กล่อง</td>
									</tr>
									
								</tbody>
							</table>
						<br>	
							<h5 class="text-center text-danger">อัตราการโอนเงินด้วยบัตร True Money ** แนะนำให้โอนผ่านทรูวอลเล็ต & ธนาคาร ** </h5>
					
					<table class="table table-bordered" style="margin-top:20px">
								<thead>
									<tr>
									<th width="20%" class="active text-center">ราคา</th>
									<th width="20%" class="active text-center">จำนวน Cash ที่ได้รับ</th>
									<th width="30%" class="active text-center">Reward Coin</th>
									<th width="30%" class="active text-center">Reward Item</th>
									</tr> 
								</thead> 
								<tbody>
									<tr>
									<td class="text-center">50</td>
									<td class="text-center">500</td>
									<td class="text-center">-</td>
									<td class="text-center">-</td>
									</tr>
									<tr>
									<td class="text-center">90</td>
									<td class="text-center">900</td>
									<td class="text-center">-</td>
									<td class="text-center">-</td>
									</tr>
									<tr>
									<td class="text-center">150</td>
									<td class="text-center">1,500</td>
									<td class="text-center">-</td>
									<td class="text-center">-</td>
									</tr>
									<tr>
									<td class="text-center">300</td>
									<td class="text-center">3,000</td>
									<td class="text-center">-</td>
									<td class="text-center">-</td>
									</tr>
									<tr>
									<td class="text-center">500</td>
									<td class="text-center">5,000</td>
									<td class="text-center">-</td>
									<td class="text-center">-</td>
									</tr>
									<tr>
									<td class="text-center">1,000</td>
									<td class="text-center">10,000</td>
									<td class="text-center">-</td>
									<td class="text-center">-</td>
									</tr>
									
								</tbody>
							</table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
