(function( $ ) {
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
