@extends('layout')

@section('title')
مشخصات نهایی سفارش 
@endsection

@section('head')
{{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('body')
<div class="col-md-6 offset-md-3">
	<br>
	<h3 class="text-center">مشخصات نهایی سفارش </h3>
	<br>
	<form action="{{ route('orders.store') }}" method="POST" dir="rtl" class="text-right">
		@csrf
        @method('POST')
        <div class="form-group">
			<label for="ad_date_sec">تاریخ تبلیغ: </label>
			<select name="ad_date_sec" class="ad_date_sec">
				@for ($i = 0; $i < 60; $i++)
					<option value="{{ $i }}">{{ $i }}</option>
				@endfor
			</select>
			<label for="ad_date_min">:</label>
			<select name="ad_date_min" class="ad_date_min">
				@for ($i = 0; $i < 60; $i++)
					<option value="{{ $i }}">{{ $i }}</option>
				@endfor
			</select>
			<label for="ad_date_hur">:</label>
			<select name="ad_date_hur" class="ad_date_hur">
				@for ($i = 0; $i < 24; $i++)
					<option value="{{ $i }}">{{ $i }}</option>
				@endfor
			</select>
			
			<label for="ad_date_day">  -  </label>
			<select name="ad_date_day" class="ad_date_day">
				@for ($i = 1; $i <= 31 ; $i++)
					<option value="{{ $i }}"
					@if ($i==Verta()->day)
					selected
					@endif
					>{{ $i }}</option>
				@endfor
			</select>
			<label for="ad_date_month">/</label>
			<select name="ad_date_month" class="ad_date_month">
				@for ($i = 1; $i <= 12 ; $i++)
					<option value="{{ $i }}"
					@if ($i==Verta()->month)
					selected
					@endif
					>{{ $i }}</option>
				@endfor
			</select>
			<label for="ad_date_year">/</label>
			<select name="ad_date_year" class="ad_date_year">
				@for ($i = 1300; $i < 2100 ; $i++)
					<option value="{{ $i }}"
					@if ($i==Verta()->year)
					selected
					@endif
					>{{ $i }}</option>
				@endfor
			</select>
        </div>

		<div class="form-group">
			<label for="off">تخفیف: </label>
			<input name="off" class="off" name="off" value="00" size="2" onfocus="this.select()">
			<label for="off">٪</label>
		</div>

		<div class="form-group">
			<label for="final_price">مبلغ نهایی: </label>
			<input name="final_price" class="final_price" name="final_price" value="{{ $final_price }}" onfocus="this.select()">
			<label for="final_price">تومان</label>
		</div>

		<button type="submit" class="btn btn-success">ثبت سفارش</button>
	</form>
</div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		
		$('.ad_date_sec').select2();
        $('.ad_date_min').select2();
		$('.ad_date_hur').select2();
		$('.ad_date_day').select2();
		$('.ad_date_month').select2();
		$('.ad_date_year').select2();

		$( ".off" )
  		.keyup(function() {
			var value = $( this ).val();
			if ($.isNumeric(value) && value>=0 && value<=100 ) {
				value={{ $final_price }} - {{ $final_price }}*value/100;
				$( ".final_price" ).val( value );
			}else{
				$( ".final_price" ).val( {{ $final_price }} );
			}
  		})
  		.keyup();
		
	});
</script>
@endsection