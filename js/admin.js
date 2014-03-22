$(document).ready(function(){
////==============User Event ===================>
var btn_update_adm=$(".btn_updateadmin_fill");
update_admin_pro_fill(btn_update_adm);// function to fill up the form..........

//login function 
$("#ajaxform").submit(function(e)
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
			if(data=='true'){
				$("#AlertMessage").fadeIn();
				 $("#AlertMessage").html('Sucessfull, login to account!');
				 window.location.href="../";
			}else{
				
				$("#AlertMessage").html('Sorry, Invalide user name or password!');
				setTimeout(function(){
						$("#AlertMessage").fadeOut();
				},1000
				);
			}
          
		   
        },
        error: function(jqXHR, textStatus, errorThrown) 
        {
           alert("Error:take a while to fix error!");    
        }
    });
    e.preventDefault(); //STOP default action
}); 

//user search 
$("#frmsearch").submit(function(e)
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
			if(data!=''){
				
				$("#list_user").html(data);
				
				 var frmblock=$("#frmblock");
				 block_use(frmblock);
				 
				 var btn_unblock=$(".btn_unblock");
				 unblock_use(btn_unblock);
			}
        },
        error: function(jqXHR, textStatus, errorThrown) 
        {
           alert("Error:take a while to fix error!");    
        }
    });
    e.preventDefault(); //STOP default action
});

//user block all
$("#frmblock_all").submit(function(e)
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
			if(data!=''){
				$("#list_user").html(data);
				var btn_unblock=$(".btn_unblock");
				unblock_use(btn_unblock);
			}
        },
        error: function(jqXHR, textStatus, errorThrown) 
        {
           alert("Error:take a while to fix error!");    
        }
    });
    e.preventDefault(); //STOP default action
});

////==============Shop Event ===================>

//shop search
$("#frmsearch_shop").submit(function(e)
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
			if(data!=''){
				
				$("#list_shop").html(data);
				
				 var frmblock=$(".frmblock_shop");
				 block_shop(frmblock);// block shop
				 
				 var btn_unblock=$(".btn_unblock_shop");
				 unblock_shop(btn_unblock);// unblock shop
				 
				 var btn_active=$(".checkactive_shop");
				 activ_user(btn_active);
				   
			}
        },
        error: function(jqXHR, textStatus, errorThrown) 
        {
           alert("Error:take a while to fix error!");    
        }
    });
    e.preventDefault(); //STOP default action
});

////==============Product Event ===================>

//product search
$("#frmsearch_product").submit(function(e)
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
			if(data!=''){
				
				$("#list_product").html(data);
				
				/* var frmblock=$(".frmblock_shop");
				 block_shop(frmblock);// block shop
				 
				 var btn_unblock=$(".btn_unblock_shop");
				 unblock_shop(btn_unblock);// unblock shop*/
				 
				 var btn_active=$(".btn_disable_pro");
				 disable_product(btn_active);
				   
			}
        },
        error: function(jqXHR, textStatus, errorThrown) 
        {
           alert("Error:take a while to fix error!");    
        }
    });
    e.preventDefault(); //STOP default action
});

$("#export_user_mon").click(function(e)
{
		  $.ajax(
		  {
			  url : '../include/monthly_user.php',
			  type: "POST",
			  data : 'monthly_user=',
			  success:function(data) 
			  {
				  alert(data);
				  
				  if(data=='true'){
					  $("#export_user_mon").after('Export Success!');
					  var d = new Date();
					  var month=d.getMonth()+1;
					  var date=d.getDate();
						if(date>=10){
							 window.location.href='../include/monthly_user'+d.getFullYear()+'-'+month+'-'+date+'.xlsx';
						}else{
							 window.location.href='../include/monthly_user'+d.getFullYear()+'-'+month+'-0'+date+'.xlsx';
						}
				  }
			  },
			  beforeSend:function(){
				  $("#export_user_mon").after("loading...");
			  }
		  });
		  e.preventDefault(); //STOP default action
});

$("#export_user_year").click(function(e)
{
		  $.ajax(
		  {
			  url : '../include/yearly_user.php',
			  type: "POST",
			  data : 'yearly_user=',
			  success:function(data) 
			  {
				  alert(data);
				  
				  if(data=='true'){
					  $("#export_user_year").after('Export Success!');
					  var d = new Date();
					  var month=d.getMonth()+1;
					  var date=d.getDate();
						if(date>=10){
							 window.location.href='../include/yearly_user'+d.getFullYear()+'-'+month+'-'+date+'.xlsx';
						}else{
							 window.location.href='../include/yearly_user'+d.getFullYear()+'-'+month+'-0'+date+'.xlsx';
						}
				  }
			  },
			  beforeSend:function(){
				  $("#export_user_year").after("loading...");
			  }
		  });
		  e.preventDefault(); //STOP default action
});

$("#export_shop_month").click(function(e)
{
		  $.ajax(
		  {
			  url : '../include/monthly_shop.php',
			  type: "POST",
			  data : 'monthly_shop=',
			  success:function(data) 
			  {
				  alert(data);
				  
				  if(data=='true'){
					  $("#export_shop_month").after('Export Success!');
					  var d = new Date();
					  var month=d.getMonth()+1;
					  var date=d.getDate();
						if(date>=10){
							 window.location.href='../include/monthly_shop'+d.getFullYear()+'-'+month+'-'+date+'.xlsx';
						}else{
							 window.location.href='../include/monthly_shop'+d.getFullYear()+'-'+month+'-0'+date+'.xlsx';
						}
					 
				  }
			  },
			  beforeSend:function(){
				  $("#export_shop_month").after("loading...");
			  }
		  });
		  e.preventDefault(); //STOP default action
});

$("#export_shop_year").click(function(e)
{
		  $.ajax(
		  {
			  url : '../include/yearly_shop.php',
			  type: "POST",
			  data : 'yearly_shop=',
			  success:function(data) 
			  {
				  alert(data);
				  
				  if(data=='true'){
					  $("#export_shop_year").after('Export Success!');
					  var d = new Date();
					  var month=d.getMonth()+1;
					  var date=d.getDate();
						if(date>=10){
							 window.location.href='../include/yearly_shop'+d.getFullYear()+'-'+month+'-'+date+'.xlsx';
						}else{
							 window.location.href='../include/yearly_shop'+d.getFullYear()+'-'+month+'-0'+date+'.xlsx';
						}
					 
				  }
			  },
			  beforeSend:function(){
				  $("#export_shop_year").after("loading...");
			  }
		  });
		  e.preventDefault(); //STOP default action
});

/////============== Admin page ==================>
$("#frm_addadmin").submit(function(e)
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
			
			if(data=='true'){
				
				 $("#message").html('Sucessfull, create an account!');
				 setTimeout(function(){
									 
					window.location.href="../admin/";
					
				 },2000
				 );
				 
			}else if(data=='exist'){
				$("#message").html('User name is already have! ');
			}else{
				$("#message").html('Problem: When insert data!');
				setTimeout(function(){
						$("#message").fadeOut();
				},2000
				);
			}
          
		   
        },
        error: function(jqXHR, textStatus, errorThrown) 
        {
           alert("Error:take a while to fix error!");    
        }
    });
    e.preventDefault(); //STOP default action
}); 

function update_admin_pro_fill(btn_update_adm){
		btn_update_adm.click(function(e){				  
			var admin_id=$(this).attr("adm_id");
			$.ajax(
					{
						url : '../include/update_load_admin.php',
						type: "POST",
						data : 'admin_id='+admin_id,
						success:function(data, textStatus, jqXHR) 
						{
							if(data!=''){
								
								$("#new_admin").html(data);
								
								var frm_updat_form=$("#frm_updateadmin");
								update_addmin(frm_updat_form);
								
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

function update_addmin(frm_admin){
	
	frm_admin.submit(function(e){
				var postData = $(this).serializeArray();
				var formURL = $(this).attr("action");
				var adm_id=$(this).attr("adm_id");
				
				$.ajax(
				{
					url : formURL,
					type: "POST",
					data : postData,
					success:function(data, textStatus, jqXHR) 
					{
						alert(data);
						
						if(data=='true'){
							
							window.location="./";
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

$(".btn_removeadm").click(function(e){				  
			var admin_id=$(this).attr("adm_id");
			var confim=confirm("Do you want to remove ?");
			if(confim){
			$.ajax(
					{
						url : '../include/remove_adm.php',
						type: "POST",
						data : 'admin_id='+admin_id,
						success:function(data, textStatus, jqXHR) 
						{
							if(data=='true'){
								
								window.location="./";
								
							}else{
								
								alert("unable to remove!");
								
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

///============= Category page ====================>

  $("#btn_addmaincategory").click(function(e){
	  var main_category_name=$("#txt_maincategory").val();
	  alert(main_category_name);
	  $.ajax({
				 url:'../include/category_page.php',
				 type:'Post',
				 data:'main_category_name='+main_category_name,
				 success:function(data){
					 alert(data);
					 if(data=='true'){
						 alert("ok");
					 }
				 },
				 beforeSend:function(){
					 
				 },
				 error:function(){
					  alert("Error: take time to fix!");
				 }
			 });
	  
  });
  var btn_img=$("#img_main_cat");
  upload_image_main(btn_img);
  
  var btn_icons=$("#icon_main_cat");
  upload_icon_main(btn_icons);



  function upload_image_main(btn_img){
	  
		  btn_img.live('change', function(){ 
			  $("#view_pic_main").html('');
			  $("#view_pic_main").html('<img src="../../images/commons/loadings.gif" alt="Uploading...."/>');
			  $("#frm_image_main").ajaxForm({
			  target: '#view_pic_main'
		  
			  }).submit();
		  });
		  
  }
  function upload_icon_main(btn_icons){
	  
		  btn_icons.live('change', function(){ 
			  $("#view_pic_icon").html('');
			  $("#view_pic_icon").html('<img src="../../images/commons/loadings.gif" alt="Uploading...."/>');
			  $("#frm_icon_main").ajaxForm({
			  target: '#view_pic_icon'
		  
			  }).submit();
		  });
		  
  }

});




/////////////////////////////// End Ready! /////////////////////////////////////////////

$(function(){
		   
	///=============User function=============
	window.block_use=function block_use(frmblock){
			frmblock.submit(function(e)
			{
				alert("a");
				var confirm_block=confirm("Are You Sure to block this user?");
				if(confirm_block){
				
					var postData = $(this).serializeArray();
					var formURL = $(this).attr("action");
					$.ajax(
					{
						url : formURL,
						type: "POST",
						data : postData,
						success:function(data, textStatus, jqXHR) 
						{
							alert(data);
							
							if(data=='true'){
								
								frmblock.after("This user has active!");
								setTimeout(function(){
									window.location.href="./";
								},1000);
								
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
		
		
	}// function block user
	window.unblock_use=function unblock_use(btn_unblock){

			btn_unblock.click(function(e)
			{
				var member_id=$(this).attr('member_id');
				alert(member_id);
				var confirm_block=confirm("Are You Sure to block this user?");
				
				if(confirm_block){
					
					$.ajax(
					{
						url : '../include/unblock.php',
						type: "POST",
						data : 'member_id='+member_id,
						success:function(data, textStatus, jqXHR) 
						{
							//alert(data);
							if(data=='true'){
								btn_unblock.after("This user has active!");
								setTimeout(function(){
									window.location.href="./";
								},1000);
								
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
		
		
	}// function unblock user
	
	///=============shop function=============
	window.block_shop=function block_shop(frmblock){
			frmblock.submit(function(e)
			{
				
				var confirm_block=confirm("Are You Sure to block this Shop?");
				if(confirm_block){
				
					var postData = $(this).serializeArray();
					var formURL = $(this).attr("action");
					$.ajax(
					{
						url : formURL,
						type: "POST",
						data : postData,
						success:function(data, textStatus, jqXHR) 
						{
							alert(data);
							
							if(data=='true'){
								
								frmblock.after("This user has disactive!");
								setTimeout(function(){
									window.location.href="./";
								},1000);
								
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
		
		
	}// function block user
	
	window.unblock_shop=function unblock_shop(btn_unblock){

			btn_unblock.click(function(e)
			{
				var shop_code=$(this).attr('shop_code');
				alert(shop_code);
				var confirm_block=confirm("Are You Sure to block this user?");
				
				if(confirm_block){
					
					$.ajax(
					{
						url : '../include/unblock_shop.php',
						type: "POST",
						data : 'shop_code='+shop_code,
						success:function(data, textStatus, jqXHR) 
						{
							alert(data);
							if(data=='true'){
								btn_unblock.after("This user has active!");
								setTimeout(function(){
									window.location.href="./";
								},1000);
								
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
			
	}// function unblock shop
	
	window.activ_user=function activ_user(btn_active){

			btn_active.click(function(e)
			{
				var confirm_block=confirm("Are You Sure to block this user?");
				
				if(confirm_block){
					
					var shop_code= $(this).attr("shop_code");
					$.ajax(
					{
						url : '../include/active_user.php',
						type: "POST",
						data : 'shop_code='+shop_code,
						success:function(data, textStatus, jqXHR) 
						{
							//alert(data);
							
							if(data=='true'){
								$(".checkactive_shop").after('The user is active');
								
								setTimeout(function(){
									window.location.href="./";
								}		   
								,1000);
								
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
			
	}// function unblock shop
	
	///=============Product function=============
	
	window.disable_product=function disable_product(btn_disable_pro){

			btn_disable_pro.click(function(e)
			{
				var confirm_block=confirm("Are You Sure to block this user?");
				
				if(confirm_block){
					
					var product_code= $(this).attr("product_code");
					$.ajax(
					{
						url : '../include/Disactive_product.php',
						type: "POST",
						data : 'product_code='+product_code,
						success:function(data, textStatus, jqXHR) 
						{
							alert(data);
							
							if(data=='true'){
								
								$(".btn_disable_pro").after('The user is active');
								
								setTimeout(function(){
									window.location.href="./";
								}		   
								,1000);
								
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
			
	}// function unblock shop
	
	//=========== admin page function========

});