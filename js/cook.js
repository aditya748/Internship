$('document').ready(function(){
	$('#success').hide();
	$('#warn').hide();
	$('#danger').hide();
	$('#emailid').hide();
	$('#mobile_warn').hide();
	$('#valid').hide();
	$('#mobile_format').hide();
	$('#pin_format').hide();
	$('#danger_sign').hide();
	var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
	$('#submit').click(function(){
		var dt = new Date();
		var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
		var cdate = dt.getFullYear() + "/" + (dt.getMonth()+1) + "/" + dt.getDate();
		var first=$('#first').val();
		var last=$('#last').val();
		var gen=$('#gen').val();
		var email=$('#email').val();
		var mobile=$('#mobile').val();
		var pwd=$('#pwd').val();
		var cpwd=$('#cpwd').val();
		var local=$('#local').val();
		var add=$('#add').val();
		var pin=$('#pin').val();
		var cui=$('#cui').val();
		var yr=$('#yr').val();
		var land=$('#land').val();
		var abt=$('#abt').val();
		var city=$('#city').val();
		var datepicker=$('#datepicker').val();
		if(first==''||last==''||email==''||mobile==''||pwd==''||cpwd==''||local==''||add==''||pin==''||cui==''||yr==''||land==''||abt==''){
			$('#success').hide();
			$('#warn').hide();
			$('#danger').show();
			$('#mobile_format').hide();
	$('#pin_format').hide();
		}
		else{
			if(!filter.test(mobile)||mobile.length!=10)
			{$('#mobile_format').show();
				$('#pin_format').hide();}
			else{
				if(!filter.test(pin)||pin.length!=6)
				{$('#mobile_format').hide();
					$('#pin_format').show();}
			else{
			if(pwd!=cpwd){
				$('#success').hide();
			$('#warn').show();
			$('#danger').hide();
			$('#emailid').hide();
			$('#mobile_warn').hide();
			$('#mobile_format').hide();
	$('#pin_format').hide();
			}
			else{
				$.ajax({
			type: "POST",
			url: "cook_database.php",
			data: {name:first,last:last,gen:gen,email:email,mobile:mobile,pwd:pwd,local:local,add:add,pin:pin,cui:cui,yr:yr,land:land,abt:abt,city:city,datepicker:datepicker,time:time,cdate:cdate}, 
		 

			success: function(data){
				//alert(data);
				if(data==1){
									
				$('#success').hide();
						$('#warn').hide();
						$('#danger').hide();
						$('#emailid').show();
				$('#mobile_warn').hide();
				$('#mobile_format').hide();
	$('#pin_format').hide();
				
				}
				else{
					if(data==2){
						
						$('#success').hide();
						$('#warn').hide();
						$('#danger').hide();
						$('#emailid').hide();
						$('#mobile_warn').show();
						$('#mobile_format').hide();
	$('#pin_format').hide();
					}
					else{
						
						$('#success').show();
						$('#warn').hide();
						$('#danger').hide();
						$('#emailid').hide();
						$('#mobile_warn').hide();
						$('#mobile_format').hide();
	$('#pin_format').hide();
	window.parent.scrollTo(0,0);
				}
				}
				}
				
		   
		});
			}
			}
			}
		}
	
	});
	$('#sign').click(function(){
		
		var email=$('#email1').val();
		var pass=$('#pwd1').val();
		if(email==''||pass==''){
			$('#danger_sign').show();
			$('#valid').hide();
		}
		else{
		$.ajax({
        type: "POST",
        url: "login_cook.php",
        data: {email:email,pass:pass}, 
        success: function(data){
			//alert(data);
			if(data==1){
				$('#valid').show();
			$('#danger_sign').hide();
			}
			else
				window.location.replace("home.php");
			}
			
			 });
		}
	});
});