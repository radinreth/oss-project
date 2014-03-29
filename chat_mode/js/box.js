function setAttributes(el, attrs) {
  for(var key in attrs) {
    el.setAttribute(key, attrs[key]);
  }
}
function mycallback(data) {
	   alert(data);
	}

function convert(str)
{
  str = str.replace(/&/g, "&amp;");
  str = str.replace(/>/g, "&gt;");
  str = str.replace(/</g, "&lt;");
  str = str.replace(/"/g, "&quot;");
  str = str.replace(/'/g, "&#039;");
  return str;
}

function Box(){
	this.build = function(box_chat){
		//alert("shop code: "+shop_code);
		$.ajax({
			   'url': 'http://ffg-cambo.com/oss-mekong/chat_mode/engine/embed/check_ccm.php?callback=mycallback&com_id='+shop_code,
			   'type': 'post',
			   'contentType': 'application/json; charset=utf-8',
			   'dataType': 'jsonp',
			   'jsonp': 'callback',
			   'data': {},
			   'success': function(data){
			   		alert(data)
			   		if(data==-1){

			   			var heading_no_counter = document.createElement("h5");
			   			setAttributes(heading_no_counter, {"style":"color: #FFFFFF;margin: 0;padding: 17px;text-align: center;"});
			   			var heading_no_counter_text = document.createTextNode("No counter available!!");
			   			heading_no_counter.appendChild(heading_no_counter_text);
			   			box_chat.appendChild(heading_no_counter);
			   		}else{

			   			var heading5 = document.createElement("h5");
			   			setAttributes(heading5, {"style":"text-align:center; cursor: pointer; margin: 0; padding: 17px; color: #fff;"});
			   			var heading_chat_now = document.createTextNode("Chat now!");
			   			heading5.appendChild(heading_chat_now);
			   			box_chat.appendChild(heading5);
			   			
			   			var image_like = document.createElement("img");
			   			//setAttributes(image_like, {"src":"http%3A%2F%2F192.168.1.6%3A81%2FOSS%2FPROJECT%2Fintegrated%2Foss%2Fchat_mode%2Fimages%2Flike.png", "class":"ico-fb", "id":"like", "style":"background: none repeat scroll 0 0 #EFEFEF; border: 1px solid #BEBEBE; cursor: pointer; position: absolute; top: 3px; right: 3px;"});
			   			setAttributes(image_like, {"src":"http://ffg-cambo.com/oss-mekong/chat_mode/images/like.png", "class":"ico-fb", "id":"like", "style":"background: none repeat scroll 0 0 #EFEFEF; border: 1px solid #BEBEBE; cursor: pointer; position: absolute; top: 3px; right: 3px;"});
			   			box_chat.appendChild(image_like);
			   			
			   			var image_dislike = document.createElement("img");
			   			//setAttributes(image_dislike, {"src":"http%3A%2F%2F192.168.1.6%3A81%2FOSS%2FPROJECT%2Fintegrated%2Foss%2Fchat_mode%2Fimages%2Fdislike.png", "class":"ico-fb", "id":"dislike", "style":"background: none repeat scroll 0 0 #EFEFEF; border: 1px solid #BEBEBE; cursor: pointer; position: absolute; top: 3px; right: 31px;"});
			   			setAttributes(image_dislike, {"src":"http://ffg-cambo.com/oss-mekong/chat_mode/images/dislike.png", "class":"ico-fb", "id":"dislike", "style":"background: none repeat scroll 0 0 #EFEFEF; border: 1px solid #BEBEBE; cursor: pointer; position: absolute; top: 3px; right: 31px;"});
			   			box_chat.appendChild(image_dislike);
			   			
			   			this.basic_info(box_chat);
			   			this.unorder_list(box_chat);
			   			
			   			this.create_form(box_chat);
			   			this.result(box_chat);
			   		}
			   },
			   'error': function(e){alert(e);}
			   });
	}

	this.create = function(){
		var body_tag = document.getElementsByTagName('body')[0];
		var box_chat = document.createElement('div');
		box_chat.className = "chat-box";
		setAttributes(box_chat, {"style":"position:fixed; z-index:999; width:305px; bottom:0; right:5px; background:#0579C2; border:3px outset rgba(0,0,255,0.6);"});
		

		this.build(box_chat);


		body_tag.appendChild(box_chat);
	}
	this.inserted_vis_id = function (chat_box) {
		var div = document.createElement("div");
		div.id = "inserted_vis_id";
		chat_box.appendChild(div);
	}
	this.get_ccm_id = function (chat_box) {
		var div = document.createElement("div");
		div.id = "ccm_id";
		chat_box.appendChild(div);
	}
	this.basic_info = function(chat_box){
		var basic_box = document.createElement('div');
		basic_box.id = "basic-info";
		setAttributes(basic_box, {"style":"width:305px;	height: 347px;	position:absolute; background:#fff;	top: 53px;"});
		
		var head3 = document.createElement("h3");
		var title = document.createTextNode("Basic Information");
		head3.appendChild(title);
		basic_box.appendChild(head3);
		
		var input_name = document.createElement("input");
		setAttributes(input_name, {"type": "text", "placeholder": "name", "value":"radin", "id":"u_name", "style":"margin: 7px;	padding: 5px; width: 270px; border: 1px solid #ccc;"});
		basic_box.appendChild(input_name);
		
		var input_email = document.createElement("input");
		setAttributes(input_email, {"type": "text", "placeholder": "email", "value":"radin@yoolk.com", "id":"u_email", "style":"margin: 7px;	padding: 5px; width: 270px; border: 1px solid #ccc;"});
		basic_box.appendChild(input_email);
		
		var button_ok = document.createElement("button");
		setAttributes(button_ok, {"type": "button", "value": "ok", "id":"basic-btn", "style":"width: 305px;"});
		var button_text = document.createTextNode("ok");
		button_ok.appendChild(button_text);
		basic_box.appendChild(button_ok);
		
		var label_process = document.createElement("h6");
		label_process.id = "basic_saving";
		setAttributes(label_process, {"style":"text-align:center; font-weight:normal;"});
		basic_box.appendChild(label_process);
		
		chat_box.appendChild(basic_box);
	}
	this.unorder_list = function(box_chat){
		var chatMessageList = document.createElement('ul');
		chatMessageList.id = "chatMessageList";
		chatMessageList.className = "chatMessageList";
		setAttributes(chatMessageList,{"style":"height: 300px; overflow: scroll; background:#E5E5E5; margin:0; padding:0;"});
		box_chat.appendChild(chatMessageList);
	}
	this.create_form = function(box_chat){
		var form = document.createElement('form');
		form.className = "formPostChat";
		form.id = "formPostChat";
		
		//setAttributes(form, {"action":"http%3A%2F%2F192.168.1.6%3A81%2FOSS%2FPROJECT%2Fintegrated%2Foss%2Fchat_mode%2Fjs%2Fajax%2FajaximageClient.php", "method":"post", "enctype":"multipart/form-data"});
		setAttributes(form, {"action":"http://ffg-cambo.com/oss-mekong/chat_mode/js/ajax/ajaximageClient.php", "method":"post", "enctype":"multipart/form-data"});
		
		var input_file = document.createElement("input");
		setAttributes(input_file, {"type":"file", "class":"filePostChat", "name":"filePostChat", "id":"filePostChat", "name": "filePostChat[]", "multiple":"multiple"})
		form.appendChild(input_file);
		
		var hidden_div = document.createElement("div");
		setAttributes(hidden_div, {"style":"background: #fff; text-align:center; display:none;", "id": "client-load-img"});
		var loading = document.createElement("img");
		//loading.setAttribute("src", "http%3A%2F%2F192.168.1.6%3A81%2FOSS%2FPROJECT%2Fintegrated%2Foss%2Fchat_mode%2Fimages%2Ffb_loader.gif");
		loading.setAttribute("src", "http://ffg-cambo.com/oss-mekong/chat_mode/images/fb_loader.gif");
		hidden_div.appendChild(loading);
		form.appendChild(hidden_div);
		
		var message = document.createElement("input");
		setAttributes(message, {"type":"text", "placeholder":"write your message here", "id":"chm_msg"});
		form.appendChild(message);
		
		var send = document.createElement("button");
		setAttributes(send, {"id":"send", "class":"send"});
		var send_text = document.createTextNode("send");
		send.appendChild(send_text);
		form.appendChild(send);
		
		box_chat.appendChild(form);
	}
	this.result = function(box_chat){
		var res = document.createElement('div');
		res.className = "result";
		box_chat.appendChild(res);
	}
}
function Engine(){
	this.toggle = function (){
		$('.login').click(function(){
			$('#login_container').toggleClass("show-hide");
		});
		$( ".chat-box ul, #formPostChat" ).hide();	
		$('.chat-box h5').click(function(){
			 $( ".chat-box ul, #formPostChat" ).animate({
				left: "+=50",
				height: "toggle"
				}, 500, function(){ 
					$(this).toggleClass('closed');
				});
		});	
	}
}
function Chatter(){

 	this.getMessage = function(callback, lastTime){
		var t = this;
		var latest = null;
		
		$.ajax({
			//'url': 'http%3A%2F%2F192.168.1.6%3A81%2FOSS%2FPROJECT%2Fintegrated%2Foss%2Fchat_mode%2Fengine%2Fe_clientEngine.php',
			'url': 'http://ffg-cambo.com/oss-mekong/chat_mode/engine/e_clientEngine.php?callback=mycallback',
			'type': 'post',
			'dataType': 'jsonp',
			'contentType': 'application/json; charset=utf-8',
			'jsonp': 'callback',
			'data': {
				'mode': 'get',
				'vis_id': $('#inserted_vis_id').val(),
				'lastTime': lastTime
			},
			'cache': false,
			'success': function(result){
				$('#client-load-img').css('display', 'none');
				$('#chm_msg, #send').css('display', 'inline');
				if(result.result){
					callback(result.message);
					latest = result.latest;
				}	
			},
			'error': function(e) {
				console.log(e);
			},
			'complete': function(){
				t.getMessage(callback, latest);
			}
		});
};
	
 	this.postMessage = function(visitor, ccm_id, text, callback){
		$.ajax({
			//'url': 'http%3A%2F%2F192.168.1.6%3A81%2FOSS%2FPROJECT%2Fintegrated%2Foss%2Fchat_mode%2Fengine%2Fe_clientEngine.php',
			'url': 'http://ffg-cambo.com/oss-mekong/chat_mode/engine/e_clientEngine.php?callback=mycallback',
			'type': 'post',
			'dataType': 'jsonp',
			'contentType': 'application/json; charset=utf-8',
			'jsonp': 'callback',
			'data': {
				'mode': 'post',
				'ccm_id': ccm_id,
				'visitor': visitor,
				'text': text
			},
			'success': function(result){
				callback(result);
			},
			'error': function(jqXHR, exception) {
					if (jqXHR.status === 0) {
						alert('Not connect.\n Verify Network.');
					} else if (jqXHR.status == 404) {
						alert('Requested page not found. [404]');
					} else if (jqXHR.status == 500) {
						alert('Internal Server Error [500].');
					} else if (exception === 'parsererror') {
						alert('Requested JSON parse failed.');
					} else if (exception === 'timeout') {
						alert('Time out error.');
					} else if (exception === 'abort') {
						alert('Ajax request aborted.');
					} else {
						alert('Uncaught Error.\n' + jqXHR.responseText);
					}
				}
		});
	};
	
};

function Satisfies(){
	this.like = function(){
		$.ajax({
			   //'url': 'http%3A%2F%2F192.168.1.6%3A81%2FOSS%2FPROJECT%2Fintegrated%2Foss%2Fchat_mode%2Fengine%2Fsatisfies%2Flike.php',
			   'url': 'http://ffg-cambo.com/oss-mekong/chat_mode/engine/satisfies/e_like.php?callback=mycallback',
			   'type': 'post',
			   'contentType': 'application/json; charset=utf-8',
			   'dataType': 'jsonp',
			   'jsonp': 'callback',
			   'data': {},
			   'success': function(){ alert("like"); },
			   'error': function(){}
			   });
	}
	this.dislike = function(){
		$.ajax({
			   //'url': 'http%3A%2F%2F192.168.1.6%3A81%2FOSS%2FPROJECT%2Fintegrated%2Foss%2Fchat_mode%2Fengine%2Fsatisfies%2Fdislike.php',
			   'url': 'http://ffg-cambo.com/oss-mekong/chat_mode/engine/satisfies/e_dislike.php?callback=mycallback',
			   'type': 'post',
			   'contentType': 'application/json; charset=utf-8',
			   'dataType': 'jsonp',
			   'jsonp': 'callback',
			   'data': {},
			   'success': function(){alert("Dislike")},
			   'error': function(){}
			   });
	}
}


var box = new Box();
box.create();
var engine = new Engine();
engine.toggle();

var c = new Chatter();
var s = new Satisfies();

$('document').ready(function(){
	//document.domain = "company.com";

	//alert(document.domain);

	//current_page = ( $("#current_page").val() != "0" ) ? '../': '';

	//current_page = 'http%3A%2F%2F192.168.1.6%3A81%2FOSS%2FPROJECT%2Fintegrated%2Foss%2F';
	current_page = 'http://ffg-cambo.com/oss-mekong/';
	$("#like").click(function(){
		s.like();						
	});
	$("#dislike").click(function(){
		s.dislike();						
	});
	$('#filePostChat').change(function() {
			
			var thiz = $(this);
			
			$('#formPostChat').unbind('submit');
			$('#formPostChat').ajaxForm({
						target: '.result',
						data: { c_v: 'filePostChat', v_id: $("#inserted_vis_id").val() },
						success: function(data){
								// show file
								thiz.val('');
								//$("#formPostChat").val();
								//document.getElementById("")
							},
							error: function(e){
								alert(e);
								}
			}).submit();

			c.getMessage(function(message){
			var chat = $("#chatMessageList").empty();
			for(var i = 0; i < message.length; i++){
				var data = '';
				if(message[i].chm_msg != ''){
					data = '<p class="chatText">' + convert(message[i].chm_msg) + '</p>';
				}else{
					
					var image_exts = ["jpg","png","gif"];
					var file_ext = message[i].chm_file.split('.').pop();
					if(!!~image_exts.indexOf(file_ext)){
						data = '<img src="' + current_page + 'chat_mode/images/uploaded/' + message[i].chm_file + '" />';	
					}else{
						data = '<a href="' + current_page + 'chat_mode/images/uploaded/' + message[i].chm_file + '">'+message[i].chm_file+'</a>';
					}
				}
				chat.append(
					'<li class="chatMessage" style="background: none repeat scroll 0 0 #FFFFFF; display: block; font-size: 14px; margin: 5px 19px; padding: 5px; position: relative;background:white;">' +
					((message[i].chm_who == "1") ? div_corner_left:div_corner_right) +
					data +
					
					'</li>'
				);
			}
			$( "ul#chatMessageList" ).scrollTop( 300 );
		});

		});
				  
	
	$('#basic-btn').click(function(){
			//alert(window.location.pathname);

			$("#basic-saving").text('Saving!...');

			$.ajax({
			   /*'url': current_page + 'chat_mode/engine/setup/',*/
			   /*http://oss-mekong.netau.net/js/bootstrap.min.js*/
			   //'url': '../../../../OSS/PROJECT/integrated/oss/chat_mode/engine/setup/index.php',
			   //'url': "http%3A%2F%2F192.168.1.6%3A81%2FOSS%2FPROJECT%2Fintegrated%2Foss%2Fchat_mode%2Fengine%2Fsetup%2Findex.php",
			   'url': "http://ffg-cambo.com/oss-mekong/chat_mode/engine/setup/e_index.php?callback=mycallback",
			   'type': 'POST',
			   'contentType': "application/json; charset=utf-8",
		       'dataType': "jsonp",
		       'jsonp': "callback",
			   'data': {
				   "name": $("#u_name").val(),
				   "email": $("#u_email").val()
				   },
			   'success': function(data) { 
						$("#basic-saving").text('save success!');

						var box_chat = document.getElementsByClassName("chat-box")[0];
						box.inserted_vis_id(box_chat);
						$('#inserted_vis_id').val(data);

						box.get_ccm_id(box_chat);

						$.ajax({
							//"url" : "http%3A%2F%2F192.168.1.6%3A81%2FOSS%2FPROJECT%2Fintegrated%2Foss%2Fchat_mode%2Fengine%2Fsetup%2Fccm_id.php",
							"url" : "http://ffg-cambo.com/oss-mekong/chat_mode/engine/setup/ccm_id.php?callback=mycallback",
							"type" : "post",
						    'contentType': "application/json; charset=utf-8",
					        'dataType': "jsonp",
					        'jsonp': "callback",
							"data" : {'shop_code': shop_code},
							"success" : function(data) {
								alert(data);
								$("#ccm_id").val(data);
							}
						});

						$('#basic-info').hide();

						//alert('data: '+data);
					},
			   'error': function(jqXHR, exception) {
					if (jqXHR.status === 0) {
						alert('Not connect.\n Verify Network.');
					} else if (jqXHR.status == 404) {
						alert('Requested page not found. [404]');
					} else if (jqXHR.status == 500) {
						alert('Internal Server Error [500].');
					} else if (exception === 'parsererror') {
						alert('Requested JSON parse failed.');
					} else if (exception === 'timeout') {
						alert('Time out error.');
					} else if (exception === 'abort') {
						alert('Ajax request aborted.');
					} else {
						alert('Uncaught Error.\n' + jqXHR.responseText);
					}
				}
		    });

		});
	
		
		var div_corner_left = '<div style="position: absolute; border-width: 7px; border-style: solid; -moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; border-image: none; border-color: rgb(255, 255, 255) rgb(255, 255, 255) transparent transparent; top: 7px; left: -14px;"> </div>';
		
		var div_corner_right = '<div style="position: absolute; bottom: 7px;  right: -14px;  width: 0;  height: 0;  border: 7px solid white; border-right-color: transparent;  border-top-color: transparent;"> </div>';
		
		$("#chm_msg").live('keypress',function(e) {
					
			if(e.which == 13) {

				$('#client-load-img').css('display', 'block');
				$('#chm_msg, #send').css('display', 'none');
					
				$('#formPostChat').submit(function(e){
					e.preventDefault();
					
					var vis_id = $("#inserted_vis_id").val();
					var ccm_id = $("#ccm_id").val();
					var chm_msg = $("#chm_msg").val();
		
					c.postMessage(vis_id, ccm_id, chm_msg, function(result){

						if(result){
							$("#chm_msg").val("");
						}

						c.getMessage(function(message){
							var chat = $("#chatMessageList").empty();
							
							for(var i = 0; i < message.length; i++){
								var data = '';
								if(message[i].chm_msg != ''){
									data = '<p class="chatText">' + convert(message[i].chm_msg) + '</p>';
								}else{
									var image_exts = ["jpg","png","gif"];
									var file_ext = message[i].chm_file.split('.').pop();
									if(!!~image_exts.indexOf(file_ext)){
										data = '<img src="'+ current_page +'chat_mode/images/uploaded/' + message[i].chm_file + '" />';	
									}else{
										data = '<a href="' + current_page + 'chat_mode/images/uploaded/' + message[i].chm_file + '">'+message[i].chm_file+'</a>';
									}
								}
								chat.append(
									'<li class="chatMessage" style="background: none repeat scroll 0 0 #FFFFFF; display: block; font-size: 14px; margin: 5px 19px; padding: 5px; position: relative;background:white;">' +
									((message[i].chm_who == "1") ? div_corner_left:div_corner_right) +
									data +
									
									'</li>'
								);
							}

							$( "ul.chatMessageList" ).scrollTop( 300 );
							
						});
						
					});
					
					callbacks.empty();
					return false;
				});
			}
		});	

		c.getMessage(function(message){
			var chat = $("#chatMessageList").empty();
			for(var i = 0; i < message.length; i++){
				var data = '';
				if(message[i].chm_msg != ''){
					data = '<p class="chatText">' + convert(message[i].chm_msg) + '</p>';
				}else{
					
					var image_exts = ["jpg","png","gif"];
					var file_ext = message[i].chm_file.split('.').pop();
					if(!!~image_exts.indexOf(file_ext)){
						data = '<img src="' + current_page + 'chat_mode/images/uploaded/' + message[i].chm_file + '" />';	
					}else{
						data = '<a href="' + current_page + 'chat_mode/images/uploaded/' + message[i].chm_file + '">'+message[i].chm_file+'</a>';
					}
				}
				chat.append(
					'<li class="chatMessage" style="background: none repeat scroll 0 0 #FFFFFF; display: block; font-size: 14px; margin: 5px 19px; padding: 5px; position: relative;background:white;">' +
					((message[i].chm_who == "1") ? div_corner_left:div_corner_right) +
					data +
					
					'</li>'
				);
			}
			$( "ul#chatMessageList" ).scrollTop( 300 );
		});

 });
