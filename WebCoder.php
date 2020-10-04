<?php

session_start();

if(!isset($_SESSION['uname']))
{
	header("Location:logout.php");
}

?>



<!DOCTYPE html>
<html>
<head>
	<title>WebCoder</title>
	<script type="text/javascript" src="jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="wc-style.css">
</head>
<body>
	<div id="header">
		<div id="mylogo">
			<a href="WebCoder.html" >WebCoder</a>
		</div>



		<div id="buttonContainer">
			<div class="toggleButton active" id="html">HTML</div>
			<div class="toggleButton" id="css">CSS</div>
			<div class="toggleButton" id="javascript">JavaScript</div>
			<div class="toggleButton active" id="output">Output</div>
		</div>
		<button><a href="logout.php">LogOut</a></button>
		<button style="color: #fff; background-color: #007bff;border-color: #007bff;" onclick="downloadhtml()">Download HTML</button>
		<button style="color: #fff; background-color: #007bff;border-color: #007bff;" onclick="downloadcss()">Download CSS</button>
		<button style="color: #fff; background-color: #007bff;border-color: #007bff;" onclick="downloadjs()">Download JS</button>
	</div>
	<div id="bodyConatiner">

		<textarea id="htmlPanel" style="height: 598px; width: 676px;" class="panel"></textarea>
		<textarea id="cssPanel" class="panel hidden"></textarea>
		<textarea id="javascriptPanel" class="panel hidden"></textarea>
		<iframe id="outputPanel" class="panel"></iframe>

	</div>
	<script type="text/javascript">
		function downloadhtml()
			{
			    var text = document.getElementById("htmlPanel").value;
			    text = text.replace(/\n/g, "\r\n"); 
			    var blob = new Blob([text], { type: "text/plain"});
			    var anchor = document.createElement("a");
			    anchor.download = "index.html";
			    anchor.href = window.URL.createObjectURL(blob);
			    anchor.target ="_blank";
			    anchor.style.display = "none";
			    document.body.appendChild(anchor);
			    anchor.click();
			    document.body.removeChild(anchor);
 			}
 		function downloadcss()
			{
			    var text = document.getElementById("cssPanel").value;
			    text = text.replace(/\n/g, "\r\n"); 
			    var blob = new Blob([text], { type: "text/plain"});
			    var anchor = document.createElement("a");
			    anchor.download = "style.css";
			    anchor.href = window.URL.createObjectURL(blob);
			    anchor.target ="_blank";
			    anchor.style.display = "none";
			    document.body.appendChild(anchor);
			    anchor.click();
			    document.body.removeChild(anchor);
 			}
 		function downloadjs()
			{
			    var text = document.getElementById("javascriptPanel").value;
			    text = text.replace(/\n/g, "\r\n"); 
			    var blob = new Blob([text], { type: "text/plain"});
			    var anchor = document.createElement("a");
			    anchor.download = "script.js";
			    anchor.href = window.URL.createObjectURL(blob);
			    anchor.target ="_blank";
			    anchor.style.display = "none";
			    document.body.appendChild(anchor);
			    anchor.click();
			    document.body.removeChild(anchor);
 			}
	</script>

	
	

	<script src="webcoderjs.js"></script>
</body>
</html>