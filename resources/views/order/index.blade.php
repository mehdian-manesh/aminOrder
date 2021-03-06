@extends('layout')

@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('title','سفارش ها')
@csrf

@section('body')
<div class="col-lg-12" dir="rtl">
	<p></p>
	<h2 class="text-center">گزارش سفارش‌ها</h2>
	<br>
	<div class="card">
		<div class="card-header">
			<div class="d-flex justify-content-between">
				<div class="align-self-center">
					سفارش‌های فعلی:
				</div>
				<div class="align-self-center" dir="ltr">
					{{ $orders->links() }}
				</div>
				<div class="align-self-center">
					<button class="edit-modal btn btn-warning"  onclick="go2('{{ route('orders.create') }}')">
						<i class="fa fa-sticky-note"></i> افزودن سفارش
					</button>
				</div>
			</div>
		</div>
		<div class="card-body">
			<table class="table table-striped table-bordered table-hover text-right vertical-align">
				<thead class="thead-dark align-top text-center">
					<tr>
						<th>شماره
							<br>
							سفارش
						</th>
						<th>نام مشتری</th>
						<th>شبکه <br> اجتماعی</th>
						<th>نام گروه/پیج</th>
						<th>تاریخ تبلیغ</th>
						<th>تخفیف</th>
						<th>مبلغ نهایی <br> (تومان)</th>
						<th>
							تایید
							<br>
							پرداخت
						</th>
						<th>تاریخ واریز</th>
						<th>امکانات</th>
					</tr>
				</thead>
				<tbody>
					@foreach($orders as $order)
					<tr class="item{{$order->id}}">
						<td>{{ Verta::persianNumbers($order->id) }}</td>
						<td>{{ $order->customer->name }}</td>
						<td class="text-center">
							<img src="{{ asset($order->socialNetworkApp()->icon_url) }}" style="width:35px;height:35px;" alter="{{ $order->socialNetworkApp()->name }}">
						</td>
						<td>{{ $order->socialNetwork->page()->name }}</td>
						<td dir="ltr" class="text-left">{{ Verta::persianNumbers(Verta($order->ad_date)->formatJalaliDatetime()) }}</td>
						<td dir="ltr" class="text-left">٪{{ Verta::persianNumbers($order->off) }}</td>
						<td class="text-left">{{ Verta::persianNumbers(number_format($order->final_price)) }}</td>
						<td class="text-center">
							<div class="custom-control custom-checkbox mb-3">
								<input type="checkbox" class="custom-control-input" id="customCheck{{ $order->id }}"
								@if($order->payment_confirmed)
								checked
								@endif onchange="this.checked = {{ $order->payment_confirmed }}" data-toggle="modal" data-target="#modalCenter" data-orders_id="{{ $order->id }}" data-yes_btn_event="change_confirmation" data-url="{{ route('orders.update',['id'=>$order->id]) }}" data-title="مطمئنید؟" data-body="آیا مطمئنید که میخواهید وضعیت واریز را برای این سفارش @if ($order->payment_confirmed) غیر@endif فعال کنید؟">
								<label class="custom-control-label" for="customCheck{{ $order->id }}"></label>
							</div>
						</td>
						<td> 
							@if (is_null($order->payment_date))
							پرداخت نشده								
							@else
							{{ Verta::persianNumbers(Verta($order->payment_date)->formatDifference()) }}</td>	
							@endif
						</td>
						<td>
							<div class="d-flex justify-content-between">
								<button class="show-modal btn btn-success" data-toggle="modal" data-target="#modalTable" data-orderId="{{ $order->id }}" data-url="{{ route('orders.show',['id'=>$order->id]) }}" data-title="نمایش اطلاعات کامل سفارش" >
									<i class="fa fa-eye"></i> نمایش
								</button>
								<button class="edit-modal btn btn-info"  onclick="go2('{{ route('orders.edit',['id'=>$order->id]) }}')">
									<i class="fa fa-edit"></i> ویرایش
								</button>
								<button class="delete-modal btn btn-danger" data-toggle="modal" data-target="#modalCenter" data-orders_id="{{ $order->id }}" data-yes_btn_event="delete" data-url="{{ route('orders.destroy',['id'=>$order->id]) }}" data-title="مطمئنید؟" data-body="مطمئنید که می‌خواهید این سفارش را حذف کنید؟">
									<i class="fa fa-trash"></i> حذف
								</button>
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div><!-- /.card-body -->
	</div><!-- /.card card-default -->
</div><!-- /.col-md-8 -->   

<script type="text/javascript">
	function go2(url) {
		location.href=url;
	}
</script>
@endsection