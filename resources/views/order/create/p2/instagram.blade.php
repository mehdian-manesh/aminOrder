@extends('layout')

@section('title')
مشخصات سفارش اینستاگرامی
@endsection

@section('head')
{{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('body')
<div class="col-md-6 offset-md-3">
	<br>
	<h3 class="text-center">مشخصات سفارش اینستاگرامی</h3>
	<br>
	<form action="{{ route('instagram.store') }}" method="POST" dir="rtl" class="text-right">
		@csrf
		@method('POST')
		<div class="form-group">
			<label for="select-page">نام پیج: </label>
			<select name="page_id" class="select-page">
				<option value="-1">یک پیج انتخاب کنید</option>
				@foreach ($pages as $page)
            <option value="{{ $page->id }}" unit_price="{{ $page->unit_price }}">{{ $page->name }}</option>
				@endforeach
			</select>
        </div>
        <div class="form-group">
            <label for="unit-price">هزینه هر ساعت: </label>
            <input disabled type="text" class="unit-price" id="unit_price" value="00">
        </div>
		<div class="form-group">
			<label for="ad_duration">مدت زمان تبلیغ: </label>
            <input name="ad_duration" class="ad_duration" name="ad_duration" value="00" onfocus="this.select()">
            <label for="ad_duration">ساعت</label>
		</div>
		<button type="submit" class="btn btn-info">صفحه بعد</button>
	</form>
</div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		
		$('.select-page').select2({
			dir: "rtl",
			placeholder: {
				id: '-1', // the value of the option
				text: "یک پیج انتخاب کنید"
			},
			// tags: true,
		});
		
		$('.select-page').on('select2:select', function (e) {
            var data = e.params.data;
            $('#unit_price').val(data.element.attributes.unit_price.value);
			// $.ajax({
			// 	url: "{{ route('customers.store') }}",
			// 	type: 'POST',
			// 	headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			// 	data: {name: data.text , _method: "POST"},
			// 	success: function(arg) {
			// 		if (arg) {
			// 			//remove previous WRONG item (it`s id is not correct).
			// 			$(".select-page option[value='" + data.id + "']").remove();
			// 			//add new item that currently created a received from Ajax.
			// 			var newOption = new Option(arg.name, arg.id, false, false);
			// 			$('.select-page').append(newOption);//.trigger('change');
			// 			//select this new create item in select-box
			// 			$('.sselect-page').val(arg.id);
			// 		}
			// 	}
			// });
		});
		
	});
</script>
@endsection