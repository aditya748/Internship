$('document').ready(function(){
	$('#danger').hide();
	$('#warn').hide();
	$('INPUT[type="file"]').change(function () {
		
    var ext = this.value.match(/\.(.+)$/)[1];
    switch (ext) {
        case 'jpg':
        case 'jpeg':
        case 'png':
        case 'gif':
            $('input[type="submit"]').removeAttr('disabled');
            break;
        default:
            $('#danger').hide();
			$('#warn').show();
            this.value = '';
			$('input[type="submit"]').attr('disabled','disabled');
    }
});
		$('#submit').click(function(){
			var name=$('#name').val();
			var cost=$('#cost').val();
			var abt=$('#abt').val();
			var pic=$('#pic').val();
			var pic=$('#pic').val();
			
			if(name==''||cost==''||pic==''){
				$('#danger').show();
				$('#warn').hide();
				event.preventDefault();
				return false;
			}
			
		});
	
	});
