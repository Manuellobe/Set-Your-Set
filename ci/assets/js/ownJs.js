$(document).ready(function(){
 var numBlock = 1;
 $("#login").click(function(){
  username=$("#username").val();
  password=$("#password").val();
  $.ajax({
   type: "POST",
   url: "/user/login",
   data: $("#form").serialize(),
   success: function(html){
		if(html=='true')
			{
				$('#myModal').modal('hide');
				$(document).ajaxStop(function(){
					window.location.reload();
				});
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
 $('.blockname').focusin(function(){
	 $(this).fadeTo( 400 , 1);
 });
 $('.blockname').focusout(function(){
	 $(this).fadeTo( 400 , 0.5);
 });
 $('.fa-times').hover(function() {
    $(this).fadeTo( 400 , 1);
  }, function() {
    $(this).fadeTo( 400 , 0.5);
  });
 $('#nonblock').hover(function(){
	 $(this).fadeTo(400, 1);
	 $(this).html('<span><b>Or click here</b></span>')
 }, function(){
	 $(this).fadeTo(400, 0.5);
	 $(this).html('<span><b>Drag an item here</b></span>')
 });
 $('#nonblock').click(function(){
	numBlock++;
	$(this).before("<div id='block' class='block' ondrop='drop(event)' ondragover='allowDrop(event)'><input type='text' placeholder='Block name' class='blockname'/> <i class='fa fa-times'></i></div>");
 });
 $('.closeblock').click(function(){
	 $(this).parent().remove();
 })
});
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
}

