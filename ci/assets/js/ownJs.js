$(document).ready(function(){
 $("#login").click(function(){
  username=$("#username").val();
  password=$("#password").val();
  $.ajax({
   type: "POST",
   url: "/user/login",
   data: "Username="+username+"&Password="+password,
   success: function(html){
		
		if(html=='true')
			{
			$('#myModal').modal('hide');
			}
			else
			{
			$("#modal_header").html('<div class="alert alert-danger" role="alert">Wrong username or password</div><h4 class="modal-title" id="myModalLabel">Input your username and password</h4>');
			}
	},
		beforeSend:function()
	{
		$("#modal_header").html('<div class="alert alert-info" role="alert">Loading...</div><h4 class="modal-title" id="myModalLabel">Input your username and password</h4>');
   }
  });
  return false;
  
 });
});