<html lang="en">
<head>
  <title>Test Croping</title>
  <script src="sizzlejs.js"></script>
  <script src="croping.js"></script>
  <link rel="stylesheet" href="stylecroping.css">
  <link rel="stylesheet" href="croping.css">
</head>
<body>


<div class="container">
	<div class="panel panel-default">
	  <div class="panel-heading">Image Upluad</div>
	  <div class="panel-body">


	  	<div class="row">
	  		<div class="col-md-4 text-center">
				<div id="upload-demo" style="width:350px">
				    
				</div>
	  		</div>
	  		<div class="col-md-4" style="padding-top:30px;">
				<strong>Select Image:</strong>
				<br/>
				<input type="file" id="upload">
				<br/>
				<button class="btn btn-success upload-result">Upload Image</button>
	  		</div>
	  		<div class="col-md-4" style="">
				<div id="upload-demo-i" style="background:#e1e1e1;width:300px;padding:30px;height:300px;margin-top:30px"></div>
	  		</div>
	  	</div>


	  </div>
	</div>
</div>

<div class="container">
	<div class="panel panel-default">
	  <div class="panel-heading">Image Upluad</div>
	  <div class="panel-body">


	  	<div class="row">
	  		<div class="col-md-4 text-center">
				<div id="upload-demo2" style="width:350px">
				    
				</div>
	  		</div>
	  		<div class="col-md-4" style="padding-top:30px;">
				<strong>Select Image:</strong>
				<br/>
				<input type="file" id="upload2">
				<br/>
				<button class="btn btn-success upload-result2">Upload Image</button>
	  		</div>
	  		<div class="col-md-4" style="">
				<div id="upload-demo-i2" style="background:#e1e1e1;width:300px;padding:30px;height:300px;margin-top:30px"></div>
	  		</div>
	  	</div>


	  </div>
	</div>
</div>


<script type="text/javascript">
$uploadCrop = $('#upload-demo').croppie({
    enableExif: true,
    viewport: {
        width: 200,
        height: 200,
        type: 'circle'
    },
    boundary: {
        width: 300,
        height: 300
    }
});

$('#upload').on('change', function () { 
	var reader = new FileReader();
    reader.onload = function (e) {
    	$uploadCrop.croppie('bind', {
    		url: e.target.result
    	}).then(function(){
    		console.log('jQuery bind complete');
    	});
    	
    }
    reader.readAsDataURL(this.files[0]);
});


$('.upload-result').on('click', function (ev) {
	$uploadCrop.croppie('result', {
		type: 'canvas',
		size: 'viewport'
	}).then(function (resp) {


		$.ajax({
			url: "ajaxpro.php",
			type: "POST",
			data: {"image":resp},
			success: function (data) {
				html = '<img src="' + resp + '" />';
				$("#upload-demo-i").html(html);
			}
		});
	});
});


</script>






<script type="text/javascript">
$uploadCrop2 = $('#upload-demo2').croppie({
    enableExif: true,
    viewport: {
        width: 200,
        height: 200,
        type: 'square'
    },
    boundary: {
        width: 300,
        height: 300
    }
});

    
    

$('#upload2').on('change', function () { 
	var reader = new FileReader();
    reader.onload = function (e) {
    	$uploadCrop2.croppie('bind', {
    		url: e.target.result
    	}).then(function(){
    		console.log('jQuery bind complete');
    	});
    	
    }
    reader.readAsDataURL(this.files[0]);
});


$('.upload-result2').on('click', function (ev) {
	$uploadCrop2.croppie('result', {
		type: 'canvas',
		size: 'viewport'
	}).then(function (resp) {


		$.ajax({
			url: "ajaxpro.php",
			type: "POST",
			data: {"image":resp},
			success: function (data) {
				html = '<img src="' + resp + '" />';
				$("#upload-demo-i2").html(html);
			}
		});
	});
});


</script>


</body>
</html>