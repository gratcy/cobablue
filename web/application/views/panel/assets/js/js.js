function formatharga(num,element) {
	num = num.toString().replace(/\$|\,/g,'');
	if(isNaN(num))
		num = "0";
	sign = (num == (num = Math.abs(num)));
	num = Math.floor(num*100+0.50000000001);
	cents = num%100;
	num = Math.floor(num/100).toString();
	if(cents<10)
		cents = "0" + cents;
	for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
		num = num.substring(0,num.length-(4*i+3))+','+
		num.substring(num.length-(4*i+3));
	element.value = num;
}

(function( $ ) {
	$.fn.setPasswordPanel = function(e) {
		var mam = {};
		e.preventDefault();
		var idnya = this;
		$.post(idnya.attr('action'), {
			email: $('input[name="email"]', idnya).val(),
			type: $('input[name="type"]', idnya).val(),
			oldpass: $('input[name="oldpass"]', idnya).val(),
			newpass: $('input[name="newpass"]', idnya).val(),
			repass: $('input[name="repass"]', idnya).val()
		},
		function(data) {
			mam = JSON.parse(data);
			if (mam.status == -1) {
				$('div#msg').html('<div class="alert alert-success">'+mam.msg+'</div>');
				$('input[type="password"]', idnya).val('');
			}
			else {
				$('div#msg').html('<div class="alert alert-danger">'+mam.msg+'</div>');
			}
		});
	}
	
	$.fn.uploadPreview = function(type) {
		$(this).change(function () {
			if (typeof (FileReader) != "undefined") {
				var dvPreview = $(".newavatar");
				
				dvPreview.html("");
				var regex = /^(.*)+(.jpg|.jpeg|.gif|.png)$/;
				$($(this)[0].files).each(function () {
					var file = $(this);
					if (regex.test(file[0].name.toLowerCase())) {
						var reader = new FileReader();
						reader.onload = function (e) {
							if (type == 2) {
								dvPreview.append('New Avatar: <br />');
							}
							var img = $("<br />New Avatar<br /><img />");
							img.attr("style", "width:150px;");
							img.attr("src", e.target.result);
							dvPreview.append(img);
						}
						reader.readAsDataURL(file[0]);
					}
					else {
						alert(file[0].name + " is not a valid image file.");
						dvPreview.html("");
						return false;
					}
				});
			}
			else {
				alert("This browser does not support HTML5 FileReader.");
			}
		});
	}
}(jQuery));
