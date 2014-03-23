$(document).ready(function() {

	//Upload logo shop
	$('#com_logo').live('change', function(){ 
                        $("#photo_view").html('');
                        $("#photo_view").html('Uploading...');
                        $("#frm_comphoto").ajaxForm({
                            target: '#photo_view'
                        }).submit();
	});
	//upload user photo

	upgrade_user($(".btn_upgrade"));

	
	$("#frm_recompany").submit(function(e)
	{
		var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data, textStatus, jqXHR) 
			{
				//alert(data);
				if(data=="true"){
					$("#show_mess").html("Save");
					setTimeout(function(){
							window.location="./";			
										},1000);
					
				}else{
					$("#show_mess").html("Fail to save");
				}
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
			   alert("Error:take a while to fix error!");    
			}
		});
		e.preventDefault(); //STOP default action
	});
	$("#frm_updatcompany").submit(function(e)
	{
		var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data, textStatus, jqXHR) 
			{
				//alert(data);
				if(data=="true"){
					$("#show_mess").html("Update");
					setTimeout(function(){
							window.location="./";			
										},1000);
					
				}else{
					$("#show_mess").html("Fail to Update");
				}
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
			   alert("Error:take a while to fix error!");    
			}
		});
		e.preventDefault(); //STOP default action
	});
	
	$("#frm_setpromotion").submit(function(e)
	{
		var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data, textStatus, jqXHR) 
			{
				//alert(data);
				if(data=="true"){
					$("#show_mess").html("Save");
					setTimeout(function(){
							window.location="./";			
										},1000);
					
				}else{
					$("#show_mess").html("Fail to save");
				}
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
			   alert("Error:take a while to fix error!");    
			}
		});
		e.preventDefault(); //STOP default action
	});
	
	$(".btn_show").click(function(e){
		var user_id=$(this).attr('user_id');
		$.ajax(
		{
			url : '../includes/show_opt.php',
			type: "POST",
			data : 'user_id='+user_id,
			success:function(data, textStatus, jqXHR) 
			{
				//alert(data);
				if(data!=""){
					$("#operator-details").html(data);
				}else{
					$("#operator-details").html("The operator not yet creat company profile");
				}
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
			   alert("Error:take a while to fix error!");    
			}
		});
					e.preventDefault(); //STOP default action
	});
	confirm_shop($(".btn_confirm"));
 	disable_shop($(".btn_block"));
	remove_promotion($(".btn_removepromotion"));
	$('.filter-content').click(function () {
		$(this).parent().find('.wrap-chat-details').slideToggle();
	});
	$("#current-account").click(function(){
		
		if ($("#account-menu").css( "display") == 'none' ) {
			$("#account-menu").css( "display", "block" );
		}else{
			$("#account-menu").css( "display", "none" );
		}
	});
	$('#verticalTab').easyResponsiveTabs({
            type: 'accordion',
            width: 'auto',
            fit: true,
            closed:'accordion'
     });
});
function confirm_shop(btn_confirm){
	btn_confirm.click(function(e){
		var user_id=$(this).attr('user_code');
		
		$.ajax(
		{
			url : '../includes/main_ad.php',
			type: "POST",
			data : 'user_id='+user_id+'&confirm_btn=',
			success:function(data, textStatus, jqXHR) 
			{
				//alert(data);
				if(data!=""){
					window.location="./";
				}else{
					alert("Fail to save");
				}
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
			   alert("Error:take a while to fix error!");    
			}
		});
		e.preventDefault(); //STOP default action
	});
}
function disable_shop(btn_disable){
	btn_disable.click(function(e){
		var user_id=$(this).attr('user_code');
		var confrim_f=confirm("Do you want to disable?");
		if(confrim_f){
		$.ajax(
		{
			url : '../includes/main_ad.php',
			type: "POST",
			data : 'user_id='+user_id+'&disable_btn=',
			success:function(data, textStatus, jqXHR) 
			{
				//alert(data);
				if(data!=""){
					window.location="./";
				}else{
					alert("Insert fails");
				}
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
			   alert("Error:take a while to fix error!");    
			}
		});
		e.preventDefault(); //STOP default action
		}else{
			return false;
		}
	});
}
function remove_promotion(btn_remove_pro){
	btn_remove_pro.click(function(e){
		var pormotion_id=$(this).attr('pormotion_id');
		var conf=confirm("Do you want to remove?");
		if(conf){
		$.ajax(
		{
			url : '../includes/main_ad.php',
			type: "POST",
			data : 'pormotion_id='+pormotion_id+'&remove_pro_btn=',
			success:function(data, textStatus, jqXHR) 
			{
				//alert(data);
				if(data!=""){
					window.location="./";
				}else{
					alert("Fail to save");
				}
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
			   alert("Error:take a while to fix error!");    
			}
		});
		e.preventDefault(); //STOP default action
		}
	});

}
function upgrade_user(btn_upgrad){
	btn_upgrad.click(function(e){
		var grade_level=$(this).attr('id');
		var operat_id=$(this).attr('operterator');
		$.ajax(
		{
			url : '../includes/main_ad.php',
			type: "POST",
			data : 'grade_level='+grade_level+'&operat_id='+operat_id,
			success:function(data, textStatus, jqXHR) 
			{
				//alert(data);
				if(data!=""){
					window.location="../../log_in";
				}else{
					alert("Update to save");
				}
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
			   alert("Error:take a while to fix error!");    
			}
		});
		e.preventDefault(); //STOP default action
	});

}