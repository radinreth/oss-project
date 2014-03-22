$(document).ready(function(){
////==============User Event ===================>
$("#btn_sub_detial").hide();
$("#btn_sub_detial2").hide();
$("#btn_sub_detial3").hide();
$("#btn_sub_detial4").hide();
$("#btn_sub_detial5").hide();
$("#btn_sub_detial6").hide();
$("#btn_sub_detial7").hide();
$("#btn_sub_detial8").hide();
$("#btn_sub_detial9").hide();
$("#btn_sub_detial9_1").hide();
$("#btn_sub_detial9_2").hide();
$("#btn_sub_detial10").hide();
$("#btn_sub_detial11").hide();
$("#btn_sub_detial12").hide();
$("#btn_sub_detial13").hide();
$("#btn_sub_detial14").hide();
$("#btn_sub_detial15").hide();

$("#btn_defin_service").click(function(){
	$("#btn_sub_detial").toggle(1000);
});
$("#btn_defin_service2").click(function(){
	$("#btn_sub_detial2").toggle(1000);
});
$("#btn_defin_service3").click(function(){
	$("#btn_sub_detial3").toggle(1000);
});
$("#btn_defin_service4").click(function(){
	$("#btn_sub_detial4").toggle(1000);
});
$("#btn_defin_service5").click(function(){
	$("#btn_sub_detial5").toggle(1000);
});
$("#btn_defin_service2").click(function(){
	$("#btn_sub_detial2").toggle(1000);
});
$("#btn_defin_service6").click(function(){
	$("#btn_sub_detial6").toggle(1000);
});
$("#btn_defin_service7").click(function(){
	$("#btn_sub_detial7").toggle(1000);
});
$("#btn_defin_service8").click(function(){
	$("#btn_sub_detial8").toggle(1000);
});
$("#btn_defin_service9_1").click(function(){
	$("#btn_sub_detial9_1").toggle(1000);
});
$("#btn_defin_service9_2").click(function(){
	$("#btn_sub_detial9_2").toggle(1000);
});
$("#btn_defin_service10").click(function(){
	$("#btn_sub_detial10").toggle(1000);
});
$("#btn_defin_service11").click(function(){
	$("#btn_sub_detial11").toggle(1000);
});
$("#btn_defin_service12").click(function(){
	$("#btn_sub_detial12").toggle(1000);
});
$("#btn_defin_service13").click(function(){
	$("#btn_sub_detial13").toggle(1000);
});
$("#btn_defin_service14").click(function(){
	$("#btn_sub_detial14").toggle(1000);
});
$("#btn_defin_service15").click(function(){
	$("#btn_sub_detial15").toggle(1000);
});

//=========hello=======
//login function 
$("#frmlogin").submit(function(e)
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
					window.location.href="../admin/";
			}else if(data=='status'){
				$("#AlertMessage").fadeIn();
				$("#AlertMessage").html('<div style="border:1px solid #eeeeee; background:#FCC;height:25px;">Sorry, Please contact: 011 232 221!</div>');
				setTimeout(function(){
						$("#AlertMessage").fadeOut();
						window.location='./';
				},10000
				);
			}else if(data=="verify"){
				$("#AlertMessage").fadeIn();
				$("#AlertMessage").html('<div style="border:1px solid #eeeeee; background:#FCC;height:25px;">Sorry, Please Verify text!</div>');
				setTimeout(function(){
						$("#AlertMessage").fadeOut();
						window.location='./';
				},2000
				);
			}else if(data=="exist"){
				$("#AlertMessage").fadeIn();
				$("#AlertMessage").html('<div style="border:1px solid #eeeeee; background:#FCC;height:25px;">Sorry, Please log out before login new account!</div>');
				setTimeout(function(){
						$("#AlertMessage").fadeOut();
						window.location='./';
				},5000
				);
			}
			else{
				$("#AlertMessage").fadeIn();
				$("#AlertMessage").html('<div style="border:1px solid #eeeeee; background:#FCC;height:25px;">Sorry, Invalide user name or password!</div>');
				setTimeout(function(){
						$("#AlertMessage").fadeOut();
						window.location='./';
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
//sign up
$("#frmsignup").submit(function(e)
{
	
	var fullname=$("#txtfullname").val();
	var txtemail=$("#txtemail").val();
	var txtpassword=$("#txtpassword").val();
	var passlen=txtpassword.length;
	if(fullname!='' && txtemail!='' && txtpassword!=''){
		var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
			if (testEmail.test(txtemail)){
				if(passlen>=5){
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
								 $("#AlertMessage").html('<div style="border:1px solid #fff;color:#FFF; background:#39F;height:20px;">Sucessfull, Sign Up!</div>');
								 setTimeout(function(){
													  window.location.href="../not_confirm/";
													 },2000
								);
								
							}else if(data=='alredy'){
								$("#AlertMessage").fadeIn();
								$("#AlertMessage").html('<div style="border:1px solid #eeeeee; background:#FCC;height:25px;">This email is already used!</div>');
								setTimeout(function(){
										$("#AlertMessage").fadeOut();
								},5000
								);
							}else{
								$("#AlertMessage").fadeIn();
								$("#AlertMessage").html('<div style="border:1px solid #eeeeee; background:#FCC;height:25px;">Fails to sign Up!</div>');
								setTimeout(function(){
										$("#AlertMessage").fadeOut();
								},5000
								);
							}
						  
						   
						},
						error: function(jqXHR, textStatus, errorThrown) 
						{
						   alert("Error:take a while to fix error!");    
						}
					});
					e.preventDefault(); //STOP default action
	
	
				}else{
					$("#AlertMessage").html('<div style="border:1px solid #eeeeee; background:#FCC;height:25px;">Your password must at least 5 characters!</div>');
					return false;
				}
			}else{
				$("#AlertMessage").html('<div style="border:1px solid #eeeeee; background:#FCC;height:25px;">Your email is invalide!</div>');
				return false;
			}
	}else{
		$("#AlertMessage").html('<div style="border:1px solid #eeeeee; background:#FCC;height:25px;">Please fill all information!</div>');
		return false;
	}
});
//var now = moment().format("ddd, MMMM Do - YYYY");
var now = new Date();
$('#date_show').html(now.toLocaleDateString());

});