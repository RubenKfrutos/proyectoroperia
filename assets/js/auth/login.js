(function () {
	$("#frm_login").submit(function (ev) {
		$("#alert").html("");
		ev.preventDefault();
		$.ajax({
			url: 'validate',
			type: 'POST',
			data: $(this).serialize(),
			success: function (data) {
				// console.log(data);
				var json = JSON.parse(data);
				//console.log(json);
				window.location.replace(json.url)
			},
			statusCode: {


				400: function (xhr) {
					// if(xhr.status == 400){
					// alert ("hola");
					$("#username > input").removeClass('is-invalid');
					$("#password > input").removeClass('is-invalid');
					var json = JSON.parse(xhr.responseText);
					if (json.username.lenght != 0) {
						$("#username > div").html(json.username);
						$("#username> input").addclass('is-invalid');
					}
					if (json.password.lenght != 0) {
						$("#password > div").html(json.password);
						$("#password > input").addclass('is-invalid');
					}
				},
				401: function (xhr) {
                    var json = JSON.parse(xhr.responseText);
                    // console.log(json);
                    $("#alert").html('<div class="alert alert-danger" role="alert">'+ json.msg +'</div>')
				}


			}


		});
		ev.preventDefault();
	});

})(jQuery);
