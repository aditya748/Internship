$('document').ready(function(event){
	
	 $('#datepicker').datepicker();
	$('#success').hide();
	$('#warn').hide();
	$('#danger').hide();
	$('#valid').hide();
	$('#danger_sign').hide();
	$('#emailid').hide();
	
	$('#mobile_warn').hide();
	$('#mobile_format').hide();
	$('#pin_format').hide();
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
		var city=$('#city').val();
		var datepicker=$('#datepicker').val();
		//alert(datepicker);
		if(first==''||last==''||email==''||email==''||pwd==''||cpwd==''||local==''||add==''||pin==''){
			$('#danger').show();
			
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
				$('#mobile_format').hide();
				$('#pin_format').hide();
				$('#danger').hide();
				$('#emailid').hide();
				$('#danger_sign').hide();
				$('#warn').show();
				$('#mobile_warn').hide();
			}
			else{
				//alert("gone");
				$.ajax({
			type: "POST",
			url: "database.php",
			data: {name:first,last:last,gen:gen,email:email,mobile:mobile,pwd:pwd,local:local,add:add,pin:pin,city:city,datepicker:datepicker,time:time,cdate:cdate}, 
		 

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
		//alert("okk");
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