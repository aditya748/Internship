$('document').ready(function(){
	$('#danger_sign').hide();
			$('#valid').hide();
$('#sign').click(function(){
		//alert(data);
		var email=$('#email1').val();
		var pass=$('#pwd1').val();
		if(email==''||pass==''){
			$('#danger_sign').show();
			$('#valid').hide();
		}
		else{
		$.ajax({
        type: "POST",
        url: "login.php",
        data: {email:email,pass:pass}, 
        success: function(data){
			//alert(data);
			if(data==1){
				$('#valid').show();
			$('#danger_sign').hide();
			}
			else
				window.location.replace("index.php");
			}
			
			 });
		}
	});
});