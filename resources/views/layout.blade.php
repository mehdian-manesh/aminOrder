<!DOCTYPE html>
<html>
<head>
	<title>@yield('title','سفارش ها')</title>
	<link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
	@yield('head')
</head>
<body>
	@yield('body','default body!')

	<!-- ModalCenter -->
	<div class="modal fade" id="modalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Modal Title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Modal Message
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal" id="modalCenterYesBtn">Yes</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
				</div>
			</div>
		</div>
	</div>

	<!-- ModalTable -->
	<div class="modal fade" id="modalTable" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" dir="rtl">
					<table class="table table-striped table-bordered table-hover text-right vertical-align">
						<thead class="thead-dark align-top">
							<tr id="modalTableHeader">
							</tr>
						</thead>
						<tbody>
							<tr id="modalTableBody">
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
<script type="text/javascript" src="{{ mix('js/myScripts.js') }}"></script>
@yield('script')
</html>