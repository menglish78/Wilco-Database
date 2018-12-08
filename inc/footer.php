	<div id="footer">
		<p id="footer_info">&copy; <?php echo date("Y"); ?> Matt English</p>
	</div>
</div>
<script>
	window.onscroll = function() {myFunction()};

	var header = document.getElementById("my_header");
	var sticky = header.offsetTop;

	function myFunction() {
	  if (window.pageYOffset > sticky) {
		header.classList.add("sticky");
	  } else {
		header.classList.remove("sticky");
	  }
	}
</script>	
	
</body>
</html>