<!DOCTYPE html>
<html>
<title>Plastic Recycle-It-Up</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
	<div class="w3-sidebar w3-bar-block w3-teal w3-large" style="display:none; width:250px" id="mySidebar">
	<button onclick="w3_close()" class="w3-bar-item w3-large">☰</button>
		<div class="w3-bar-item" style="font-size:23.5px">Plastic Recycle-It-Up</div> 
		<a href="dashboard" class="w3-bar-item w3-button" style="font-size:23px"><i class="fa fa-home"></i> Overview</a> 
		<a href="adminUser" class="w3-bar-item w3-button" style="font-size:23px"><i class="fa fa-user-circle"></i> Users</a> 
		<a href="blogs" class="w3-bar-item w3-button" style="font-size:23px"><i class="fa fa-bell"></i> Blogs</a> 
		<a href="adminForum" class="w3-bar-item w3-button" style="font-size:23px"><i class="fa fa-th-large"></i> Forum</a>
		<a href="adminNewsletter" class="w3-bar-item w3-button" style="font-size:23px"><i class="fa fa-envelope"></i> Newsletter</a> 
		<a href="adminForm" class="w3-bar-item w3-button" style="font-size:23px"><i class="fa fa-file-text"></i> Forms</a> 
		<a href="#" class="w3-bar-item w3-button" style="font-size:23px"><i class="fa fa-sign-out"></i> Logout</a> 
	</div>  
	<button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>

<script>
	function w3_open() {
	document.getElementById("mySidebar").style.display = "block";
	}

	function w3_close() {
	document.getElementById("mySidebar").style.display = "none";
	}
</script>
</body>
</html>
