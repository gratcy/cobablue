(function($){
	$.fn.iklan_popup_expire = function(opt){
		var opt = $.extend( {id: "IklanIDGS_popup", img: "close.png"}, opt);
		var obj = {all: $("<div id='"+opt.id+"'><span><img src='"+opt.img+"'/><div id='isi_iklan_popup'></div></span></div>"), css: $("<link rel='stylesheet' type='text/css' href='"+opt.css+"'></link>"), win: $(window), mirror: $(opt.mirror), shadow: $("<div></div>")};
		obj.css.appendTo("head");
		obj.container = obj.all.find("div#isi_iklan_popup");
		obj.closer = obj.all.children("span");
		this.appendTo(obj.container);
		obj.all.appendTo("body");
		var tengah = $(window).width() / 2;
		var tengah2 = $(window).height() / 2;
		var size = {width: tengah, height: tengah2};
		obj.shadow.css(size).appendTo(obj.mirror);
		var resizing = function(){
			obj.all.css({left:tengah - 328});
		};
		resizing();
		obj.win.resize(function(){
			resizing();
		});
		obj.closer.click(function(){
			obj.all.remove();
			obj.shadow.remove();
			$.cookie("iklan_popup_cookie", 1,{expires:1});
		});
	};
}) (jQuery);
