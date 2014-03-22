// JavaScript Document
/**
* Author: Mr. RETH RADIN
* Education: Bachelor degree, MSCIT, 7th generation, 2009-2013.
* Subject: IS440, Mr. Ya borin.
* Description: The source code here, you may likely to use, copy, modify
*	for any application you like but you may keep these few comment lines
*	because due of rights that has been copied and term of uses...
**/


/*$("#current-account").click(function(){
	if ($("#account-menu").css( "display") == 'none' ) {
		$("#account-menu").css( "display", "block" );
	}else{
		$("#account-menu").css( "display", "none" );
	}
});*/


/*function getFiles() {
	var inp = document.getElementById('file-'+$("#c-visitor").val());
	for (var i = 0; i < inp.files.length; ++i) {
	  var name = inp.files.item(i).name;
	  alert("here is a file name: " + name);
	}
	alert();
}*/

/*function sendFile(file) {
  $.ajax({
    type: 'post',
    url: 'js/engine/chatterEngine.php?name=' + file.fileName,
    data: file,
    success: function () {
      // do something
    },
    xhrFields: {
      // add listener to XMLHTTPRequest object directly for progress (jquery doesn't have this yet)
      onprogress: function (progress) {
        // calculate upload progress
        var percentage = Math.floor((progress.total / progress.totalSize) * 100);
        // log upload progress to console
        console.log('progress', percentage);
        if (percentage === 100) {
          console.log('DONE!');
        }
      }
    },
    processData: false,
    contentType: file.type
  });
}*/

function convert(str)
{
  str = str.replace(/&/g, "&amp;");
  str = str.replace(/>/g, "&gt;");
  str = str.replace(/</g, "&lt;");
  str = str.replace(/"/g, "&quot;");
  str = str.replace(/'/g, "&#039;");
  return str;
}

sendMail = function(){
	$.ajax({
		   'url'	: '../../chat_mode/engine/mailer/',
		   'type'	: 'post',
		   'data'	: {'vis_id': $("#c-visitor").val()},
		   'success': function(data){ alert(data);},
		   'error'	: function(data){ alert(data)}
		   });	
}
function UpdateRequest(){
	this.RequestReject = function(swq_id){
		$.ajax({
			    'url'		: '../../chat_mode/engine/switch/get.php',
				'type'		: 'post',
				'data'		: {'type':'reject', 'swq_id': swq_id},
				'success'	: function(data){
					alert(data);
				},
				'error'		: function(){}
		});
	}
	this.RequestAccept = function(swq_id, vis_id, swq_requester, swq_responder){
		$.ajax({
			    'url'		: '../../chat_mode/engine/switch/get.php',
				'type'		: 'post',
				'data'		: { 'type':'accept', 
								'swq_id': swq_id, 
								'vis_id': vis_id, 
								'swq_requester': swq_requester, 
								'swq_responder': swq_responder
							   },
				'success'	: function(data){
					alert(data);
				},
				'error'		: function(e){ alert(e); }
		});
	}
}
function Requester(){
	this.getRequest	= function() {
		$.ajax({
				   'url'		: '../../chat_mode/engine/switch/get.php',
				   'type'		: 'post',
				   'dataType'	: 'json',
				   'data'		: {'responder': 'responder'},
				   'cache'		: false,
				   'success'	: function(data){
					   				//alert(data);
									var list = $("#list-switch-result").empty();
					   				for(var i = 0; i < data.length; i++){
										//alert(data[i].swq_responder);
										list.append(
												'<li data-switch="' + data[i].swq_id + '">' +
												'Request <a href="#">' + data[i].vis_id + '</a>' +
												' from <a href="#">' + data[i].swq_requester + '</a>' +
												' &middot; [<span onclick="var ua = new UpdateRequest(); ua.RequestAccept('+data[i].swq_id+', '+data[i].vis_id+', '+data[i].swq_requester+', '+data[i].swq_responder+')">accept</span>, <span class="switch-reject" onclick="var ur = new UpdateRequest(); ur.RequestReject('+data[i].swq_id+')">reject</span>]' +
												'</li>'
													);
									}
								},
				   'error'		: function(){}
			   });
	}
}
function Chatter(){

	this.getMessage = function(callback, lastTime){
		var t = this;
		var r = new Requester();
		var latest = null;
		$.ajax({
			'url'		: '../../chat_mode/engine/chatterEngine.php',
			'type'		: 'post',
			'dataType'	: 'json',
			'data'		: {
							'mode': 'get',
							'vis_id': $('#c-visitor').val(),
							'lastTime': lastTime
						},
			'cache'		: false,
			'success'	: function(result){
							if(result.result){
								callback(result.message);
								latest = result.latest;
							}	
						},
			'error'		: function(e) {
							console.log(e);
						},
			'complete'	: function(){
							r.getRequest();
							t.getMessage(callback, latest);
						}
			});
	};
	
	this.postMessage = function(visitor, text, callback){
		$.ajax({
			'url'		: '../../chat_mode/engine/chatterEngine.php',
			'type'		: 'post',
			'dataType'	: 'json',
			'data'		: {
							'mode'		: 'post',
							'visitor'	: visitor,
							'text'		: text
						},
			'success'	: function(result){
							callback(result);
							$(".loading").each(function(index){
								$(".loading").css("visibility","hidden");
							});
						},
			'error'		: function(jqXHR, exception) {
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

var c = new Chatter();


$(document).ready(function(){
		
		$(".img-history").click(function(){
		 	sendMail();
		 });
		
		
		
		var div_corner_left = '<div style="position: absolute; border-width: 7px; border-style: solid; -moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; border-image: none; border-color: rgb(255, 255, 255) rgb(255, 255, 255) transparent transparent; top: 0; left: -14px;"> </div>';
		
		var div_corner_right = '<div style="position: absolute; bottom: 0;  right: -13px;  width: 0;  height: 0;  border: 7px solid white; border-right-color: transparent;  border-top-color: transparent;"> </div>';
		
		
		$('.files').change(function() {
			/*var listFiles = document.getElementById(this.id).files;
			var list = $(this).parent().append('<ol></ol>').find('ol').attr('class','attach-list');
			
			for(var i=0; i<listFiles.length; i++){
				//alert(listFiles[i].name + '  ' + listFiles[i].type + "  " + listFiles[i].size);
				list.append('<li> Name: '+listFiles[i].name + ', Type: ' + listFiles[i].type + ', Size: ' + listFiles[i].size+'</li>');
			}*/
			var thiz = $(this);
			//list.append('<li>'+ $(this).closest('form').attr('id') +'</li>');
			$(".loading").css("visibility","visible");
			$('#'+$(this).closest('form').attr('id')).unbind('submit');
			$('#'+$(this).closest('form').attr('id')).ajaxForm({
						target: '.result',
						data: { c_v: thiz.attr('name'), v_id: $('#c-visitor').val() },
						success: function(){
								$('.attach-list').fadeOut(3000, function(){ $(this).remove();}); 
								thiz.val('');
							},
							error: function(e){
								alert(e);
								}
			}).submit();
			$(".loading").css("visibility","hidden");
		});
		
		$(".loading").css('visibility', 'hidden');
		$(".postText").live('keypress',function(e) {
			if(e.which == 13) {
				$(".loading").css('visibility', 'visible');
				$('.formPostChat').submit(function(e){
					e.preventDefault();
					
					var visitor = $('#c-visitor');
					var text;
					
					$('.postText').each(function(index){
						if ($(this).val() != '') {
							text = $(this).val();
						}
					});

					c.postMessage(visitor.val(), text, function(result){

						if(result){
							$('.postText').each(function(index){
								if ($(this).val() != '') {
									$(this).val('');
								}
							});
						}
						c.getMessage(function(message){
							var chat = $('#chatMessageList-'+$('#c-visitor').val()).empty();
							for(var i = 0; i < message.length; i++){
								var data = '';
								if(message[i].chm_msg != ''){
									data = '<p class="chatText">' + convert(message[i].chm_msg) + '</p>';
								}else{
									
									var image_exts = ["jpg","png","gif"];
									var file_ext = message[i].chm_file.split('.').pop();
									if(!!~image_exts.indexOf(file_ext)){
										data = '<img src="../../chat_mode/images/uploaded/' + message[i].chm_file + '" style="width:100px" />';	
									}else{
										data = '<a href="../../chat_mode/images/uploaded/' + message[i].chm_file + '">'+message[i].chm_file+'</a>';
									}
								}
								chat.append(
									'<li class="chatMessage">' +
									((message[i].chm_who == "1") ? div_corner_left:div_corner_right) +
									data +
									'</li>'
								);
							}
							$( "ul.chatMessageList" ).scrollTop($('#chatMessageList-'+$('#c-visitor').val())[0].scrollHeight);
						});
						
					});
					
					callbacks.empty();
					return false;
				});
			}
		});	


		$('.resp-tabs-list li').live("click",function(){
			$(".img-history, #switch_opt").css("visibility", "visible");
			
			c.getMessage(function(message){
				var chat = $('#chatMessageList-'+$('#c-visitor').val()).empty();
				for(var i = 0; i < message.length; i++){
					var data = '';
					if(message[i].chm_msg != ''){
						data = '<p class="chatText">' + convert(message[i].chm_msg) + '</p>';
					}else{
						var image_exts = ["jpg","png","gif"];
						var file_ext = message[i].chm_file.split('.').pop();
						if(!!~image_exts.indexOf(file_ext)){
							data = '<img src="../../chat_mode/images/uploaded/' + message[i].chm_file + '" style="width:100px" />';	
						}else{
							data = '<a href="../../chat_mode/images/uploaded/' + message[i].chm_file + '">'+message[i].chm_file+'</a>';
						}
					}
					chat.append(
						'<li class="chatMessage">' +
						((message[i].chm_who == "1") ? div_corner_left:div_corner_right) +
						data +
						'</li>'
					);
				}
				$( "ul.chatMessageList" ).scrollTop($('#chatMessageList-'+$('#c-visitor').val())[0].scrollHeight);
			});
		});	
		
		
		
		c.getMessage(function(message){
			var chat = $('#chatMessageList-'+$('#c-visitor').val()).empty();
			for(var i = 0; i < message.length; i++){
				var data = '';
				if(message[i].chm_msg != ''){
					data = '<p class="chatText">' + convert(message[i].chm_msg) + '</p>';
				}else{
					var image_exts = ["jpg","png","gif"];
					var file_ext = message[i].chm_file.split('.').pop();
					if(!!~image_exts.indexOf(file_ext)){
						data = '<img src="../../chat_mode/images/uploaded/' + message[i].chm_file + '" style="width:100px" />';	
					}else{
						data = '<a href="../../chat_mode/images/uploaded/' + message[i].chm_file + '">'+message[i].chm_file+'</a>';
					}
				}
				chat.append(
					'<li class="chatMessage">' +
					((message[i].chm_who == "1") ? div_corner_left:div_corner_right) +
					data +
					'</li>'
				);
			}
			$( "ul.chatMessageList" ).scrollTop($('#chatMessageList-'+$('#c-visitor').val())[0].scrollHeight);
			
		});

});
