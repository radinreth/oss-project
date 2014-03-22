$(document).ready(function(){				  
$("#user_photo").change(function(event){
                      $("#r_photo").html('');
                        $("#r_photo").html('Uploading...');
                        $("#frm_uploadimage").ajaxForm({
                            target: '#r_photo'
                        }).submit();
});				   		//event.preventDefault();
});