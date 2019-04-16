@extends('layout')

@section('title')
افزودن سفارش
@endsection

@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('body')
<div class="col-md-6 offset-md-3">
	<br>
	<h3 class="text-center">افزودن سفارش</h3>
	<br>
	<form action="{{ route('orders.store') }}" method="POST" dir="rtl" class="text-right">
		@csrf
		@method('POST')
		<div class="form-group">
			<label for="select-customer">نام مشتری: </label>
			<select class="select-customer">
				<option value="-1">یک مشتری انتخاب یا اضافه کنید</option>
				@foreach ($customers as $customer)
				<option value="{{ $customer->id }}">{{ $customer->name }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="selectSocialApp">شبکه اجتماعی: </label>
			<select class="selectSocialApp">
				<option value="-1">یک شبکه اجتماعی انتخاب کنید</option>
				@foreach ($socialApps as $socialApp)
				<option value="{{ $socialApp->id }}" src="{{ asset($socialApp->icon_url) }}" style="width:25px;height:25px;">
						{{ $socialApp->name }}
				</option>
				@endforeach
			</select>
		</div>
		<button type="submit" class="btn btn-info">صفحه بعد</button>
	</form>
</div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {

		$('.select-customer').select2({
			dir: "rtl",
			placeholder: {
    		id: '-1', // the value of the option
    		text: "یک مشتری انتخاب یا اضافه کنید"
    		},
    		tags: true,
    	});

		$('.select-customer').on('select2:select', function (e) {
			var data = e.params.data;
			$.ajax({
				url: "{{ route('customers.store') }}",
				type: 'POST',
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				data: {name: data.text , _method: "POST"},
				success: function(arg) {
					if (arg) {
						//remove previous WRONG item (it`s id is not correct).
						$(".select-customer option[value='" + data.id + "']").remove();
						//add new item that currently created a received from Ajax.
						var newOption = new Option(arg.name, arg.id, false, false);
						$('.select-customer').append(newOption);//.trigger('change');
						//select this new create item in select-box
						$('.select-customer').val(arg.id);
					}
				}
			});
		});

		$('.selectSocialApp').select2({
			dir: "rtl",
			placeholder: {
    			id: '-1', // the value of the option
    			text: "یک شبکه اجتماعی انتخاب کنید"
    		},
			templateResult: formatState
		});

		function formatState (state) {
			if (!state.id || state.id<1) { return state.text; }
			var $state = $(
				'<span >' + state.text + '<img sytle="display: inline-block;" src="'+state.element.attributes.src.value+'" style="'+state.element.attributes.style.value+'" /> </span>'
				);
			return $state;
		}
		
	});
</script>
@endsection
