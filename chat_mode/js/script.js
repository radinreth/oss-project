function convert(str)
{
  str = str.replace(/&/g, "&amp;");
  str = str.replace(/>/g, "&gt;");
  str = str.replace(/</g, "&lt;");
  str = str.replace(/"/g, "&quot;");
  str = str.replace(/'/g, "&#039;");
  return str;
}

function Chatter(){

	this.getMessage = function(callback, lastTime){
		var t = this;
		var latest = null;
		
		$.ajax({
			'url': current_page + 'chat_mode/engine/clientEngine.php',
			'type': 'post',
			'dataType': 'json',
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
			'url': '../chat_mode/engine/clientEngine.php',
			'type': 'post',
			'dataType': 'json',
			'data': {
				'mode': 'post',
				'visitor': visitor,
				'ccm_id': ccm_id,
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
			   'url': '../chat_mode/engine/satisfies/like.php',
			   'type': 'post',
			   'data': {},
			   'success': function(){ alert("like"); },
			   'error': function(){}
			   });
	}
	this.dislike = function(){
		$.ajax({
			   'url': '../chat_mode/engine/satisfies/dislike.php',
			   'type': 'post',
			   'data': {},
			   'success': function(){alert("Dislike")},
			   'error': function(){}
			   });
	}
}

var c = new Chatter();
var s = new Satisfies();

 $('document').ready(function(){
	current_page = ( $("#current_page").val() != "0" ) ? '../': '';
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
									'<li class="chatMessage">' +
									((message[i].chm_who == "1") ? div_corner_left:div_corner_right) +
									data +
									
									'</li>'
								);
			}
			$( "ul#chatMessageList" ).scrollTop( 300 );
		});
			
		});
				  
	$('.login').click(function(){
		$('#login_container').toggleClass("show-hide");
	});
	$( ".chat-box ul, #formPostChat" ).hide();
	
	//$('#basic-info').hide();
	
	
	$('.chat-box h5').click(function(){
		 $( ".chat-box ul, #formPostChat" ).animate({
			left: "+=50",
			height: "toggle"
			}, 500, function(){ 
				$(this).toggleClass('closed');
				if($(this).attr('class')){
					
				}else{
					
				}
			});
	});
	
	$('#basic-btn').click(function(){
			
			$("#basic-saving").text('Saving!...');		
			$.ajax({
			   'url': '../chat_mode/engine/setup/',
			   'type': 'post',
			   'data': {
				   'name': $('#u_name').val(),
				   'email': $('#u_email').val()
				   },
			   'success': function(data){ 
							$("#basic-saving").text('save success!'); 
							alert('success: '+data);
							$('#inserted_vis_id').val(data); 
							$('#basic-info').hide();
							/*setTimeout(function() { $('#basic-info').hide() }, 5000);*/ },
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
	
		
		var div_corner_left = '<div style="position: absolute; border-width: 7px; border-style: solid; -moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; border-image: none; border-color: rgb(255, 255, 255) rgb(255, 255, 255) transparent transparent; top: -1px; left: -15px;"> </div>';
		
		var div_corner_right = '<div style="position: absolute; bottom: -1px;  right: -15px;  width: 0;  height: 0;  border: 7px solid white; border-right-color: transparent;  border-top-color: transparent;"> </div>';
		
		$("#chm_msg").live('keypress',function(e) {
					
			if(e.which == 13) {

				$('#client-load-img').css('display', 'block');
				$('#chm_msg, #send').css('display', 'none');
					
				$('#formPostChat').submit(function(e){
					e.preventDefault();
					
					var vis_id = $("#inserted_vis_id").val();
					var chm_msg = $("#chm_msg").val();
					var ccm_id = $("#ccm_id").val();
					
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
									'<li class="chatMessage">' +
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
									'<li class="chatMessage">' +
									((message[i].chm_who == "1") ? div_corner_left:div_corner_right) +
									data +
									
									'</li>'
								);
			}
			$( "ul#chatMessageList" ).scrollTop( 300 );
		});

 });