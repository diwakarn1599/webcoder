function updateOutput()
		{
			$("iframe").contents().find("html").html("<!DOCTYPE html><html><head><style type='text/css'>"+$("#cssPanel").val()+"</style><body>" + $("#htmlPanel").val()+"</body></html>");
			document.getElementById("outputPanel").contentWindow.eval($("#javascriptPanel").val());
		}
		$(".toggleButton").hover(function()
			{
				$(this).addClass("highlightButton");
			},function()
			{
				$(this).removeClass("highlightButton");
			});

		$(".toggleButton").click(function()
		{
			$(this).toggleClass("active");
			$(this).removeClass("highlightButton");
			var pid = $(this).attr("id") +"Panel";
			$("#" + pid).toggleClass("hidden");
			var ac= 4-$(".hidden").length;
			$(".panel").width($(window).width()/ac -10);
		});
		$(".panel").height($(window).height() - $("#header").height()-15);
		$(".panel").width($(window).width()/2 -10);
		updateOutput();
		$("textarea").on('change keyup paste', function (){
			updateOutput();

		});
		/*function downloadhtml()
			{
			    var text = document.getElementById("htmlPanel").value;
			    text = text.replace(/\n/g, "\r\n"); 
			    var blob = new Blob([text], { type: "text/plain"});
			    var anchor = document.createElement("a");
			    anchor.download = "my-filename.txt";
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
 			}*/