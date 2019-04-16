<!-- ModalTable -->
<div class="modal fade" id="modalTable" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table class="table table-striped table-bordered table-hover text-right vertical-align">
					<thead class="thead-dark align-top">
						<tr>
							@foreach ($heads as $head)
								<th>{{ $head }}</th>
							@endforeach
						</tr>
					</thead>
					<tbody>
						<tr>
							@foreach ($bodies as $body)
								<th>{{ $body }}</th>
							@endforeach
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>