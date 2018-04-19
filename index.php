<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Translator</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/mdb.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<script src='https://code.responsivevoice.org/responsivevoice.js'></script>
</head>

<body>
	<!--Navbar-->
	<nav class="navbar navbar-expand-lg navbar-light warning-color lighten-4">

		<a class="navbar-brand" href="#">Translator</a>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav"
		aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<!-- collapsible content -->
		<div class="collapse navbar-collapse" id="basicExampleNav">

			<!-- Links -->
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="#">Home
						<span class="sr-only">(current)</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Your List</a>
				</li>
			</ul>
		</div>
		<!-- collapsible content -->

	</nav>
	<!--/.Navbar-->

	<!-- Start your project here-->
	<div class="container">
		<div class="row ml-2">
			<div class="btn-group" data-toggle="buttons">
				<label class="btn btn-primary">
					<input type="radio" name="options" id="option2" autocomplete="off"> English
				</label>
				<label class="btn btn-primary">
					<input type="radio" name="options" id="option3" autocomplete="off"> Bangla
				</label>
			</div>
		</div>
		<div class="row justify-content-md-center">
			<div class="col-sm-6">
				<div class="md-form">
					<textarea id="textareaTranslator" name="textareaTranslator" class="form-control md-textarea white-text" rows="3" autofocus="on" placeholder="Write the word you want to translate"></textarea>
					<p>
						<img src="img/LoaderIcon.gif" id="loaderIcon" style="display:none; width: 30px">
					</p>
					<button class="">
						<i class="fa fa-volume-up fa-w-18" style="color: #fff;"></i>
					</button>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="md-form">
					<textarea type="text" id="translateResult" class="form-control md-textarea disabled blockquote" rows="3"></textarea>	
				</div>
			</div>
		</div>
	</div>
	<script>
		var input = document.getElementById("textareaTranslator");
		input.addEventListener("keyup", function(event) {
		    event.preventDefault();
		    if (event.keyCode === 13) {
		        translateWord();
		    }
		});
		function translateWord() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "translate.php",
                data:'textareaTranslator='+$("#textareaTranslator").val(),
                type: "POST",
                success:function(data){
                    $("#translateResult").html(data);
                    $("#loaderIcon").hide();
                },
                error:function (){}
            });
        }
        function textToSpeech() {
        	var text = document.getElementById("textareaTranslator").value;
        	console.log(text);
        }
	</script>
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<!-- Bootstrap tooltips -->
	<script type="text/javascript" src="js/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="js/mdb.min.js"></script>
</body>

</html>
