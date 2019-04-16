function goto(url) {
  location.href=url;
}

function log(argument="hello!") {
  console.log(argument);
}

var EventFunctions=
{
  change_confirmation: function(arg)
  {
    $.ajax({
      url: arg.data.url,
      type: 'PATCH',
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      data: {change_confirmation:true,id:arg.data.id , _method: "PATCH"},
      success: function(arg) {
        location.reload(true);
      }
    });
  },
  delete: function(arg)
  {
    $.ajax({
      url: arg.data.url,
      type: 'DELETE',
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      data: {change_confirmation:true,id:arg.data.id , _method: "DELETE"},
      success: function(arg) {
        location.reload(true);
      }
    });
  }
}

$('#modalCenter').on('show.bs.modal', function (event) {
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      orders_id=$(event.relatedTarget).data('orders_id');
      url=$(event.relatedTarget).data('url');
      title=$(event.relatedTarget).data('title');
      body=$(event.relatedTarget).data('body');
      yes_btn_event=$(event.relatedTarget).data('yes_btn_event');
      $(this).find('.modal-title').text(title);
      $(this).find('.modal-body').text(body);
      // $(this).find('.btn btn-primary').click(EventFunctions[yes_btn_event](url));
      // $(this).on('click', '#modalCenterYesBtn',log("event!"));
      $("#modalCenterYesBtn").one("click", {url: url,id:orders_id}, EventFunctions[yes_btn_event]);
    })

 $('#modalCenter').on('hide.bs.modal', function (event) {
  $("#modalCenterYesBtn").off("click");
 });

$('#modalTable').on('show.bs.modal', function (event) {
  		// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  		// $.ajaxSetup({
  		// 	headers: {
  		// 		'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
  		// 	}
  		// });
      jQuery.ajax({
       url: $(event.relatedTarget).data('url'),
       method: 'get',
       success: function(result){
        datas=JSON.parse(result)
        console.log(datas)
        titles=Object.keys(datas)
        values=Object.values(datas)
        $('#modalTableHeader').html("");
        $('#modalTableBody').html("");
        for (var i =0; i< titles.length ; i++) {
          $('#modalTableHeader').html($('#modalTableHeader').html()+"\n<td>\n"+titles[i]+"\n</td>");
          $('#modalTableBody').html($('#modalTableBody').html()+"\n<td>\n"+values[i]+"\n</td>");
        }
      }});
  		// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  		$(this).find('.modal-title').text($(event.relatedTarget).data('title'))
    })
