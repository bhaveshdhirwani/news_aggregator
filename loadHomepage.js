$(function() {
	$(".newsTicker").mouseover( function(e) {
		var ID=$(e.target).attr("id");
		//alert(ID);
		var result="";
		
		$.ajax({
			type: "GET",
			url: "retreiveTagline.php",
			datatype: "html",
			data: "imgID="+ID,
			sucess: function(response) {
				var obj = $.parseJSON(data);
				$.each(obj, function() {
                        result += this['tagLine'];
			});
		
		}
		
		/*var newsbox=$("<p></p>");
		$('newsbox').append(document.createTextNode(newsTagLine));
		//alert(newsTagLine);
		$(".tag"+ID).append('newsbox');*/
	});	
	
	alert(result);
});
});