
	//Ajax contact
	var form = $('.contact-form');
	form.submit(function () {
		$this = $(this);
		jnnjn($this);
		// $.post($(this).attr('action'), function(data) {
		// 	$this.prev().text(data.message).fadeIn().delay(3000).fadeOut();
		// },'json');
		return false;
	});

function jnnjn(slecc){
	email=$('#email').val();
	name=$('#name').val();
	subject=$('#subject').val();
	message=$('#message').val();
	$.ajax({
 		data:"email="+email+"&name="+name+"&title="+subject+"&topic="+message,
 		dataType: "json",
 		url:slecc.attr('action'),
 		type:"POST",
 		success: function(val){
			slecc.prev().text(val.message).fadeIn();
			// .delay(3000).fadeOut();
  		},
 		error: function(error) { 
 			console.log(error);
 		}
 	})
}