function login()
{
	$.ajax({
	url:""+site_url+"login/cekLogin",
	type: "POST",
	data: $('#formlogin').serialize(),
	dataType: "JSON",
	beforeSend: function() {
		$('#msg').html("<img src='"+base_url+"/public/theme/images/loader/loadingblue.gif'> Please wait...");
	},
	success: function(data)
		{
			$('#msg').html("");
		   if(data["upass"]==false){
			  	$('#msg_res').html("<div class='alert alert-danger alert-dismissible fade show' role='alert'><i class='fas fa-cancel-circle'></i>&nbsp;Username/Password Salah!<button type='button' class='close' data-dismiss='alert' aria-label='Close' style='margin-top:-18px;margin-right:4px;'><span aria-hidden='true'>&times;</span></button></div>"); 
			  	return false;
		   }

		   if(data["validasi"]==true){
				$('#msg_res').html("<div class='alert alert-success alert-dismissible fade show' role='alert'><i class='fas fa-cancel-circle'></i>&nbsp;Login Berhasil, Mohon Tunggu...<button type='button' class='close' data-dismiss='alert' aria-label='Close' style='margin-top:-18px;margin-right:4px;'><span aria-hidden='true'>&times;</span></button></div>");	
				window.location.href=""+site_url+""+data["direct"]; 
		   }else{
				window.location.href=""+site_url+"logout"; 
		   }
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
			alert('Try Again!');
			$('#msg').html("");
			return false;
		}
	});
 
}		