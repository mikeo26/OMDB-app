	<div class="container footer">
		<div class="row">
			<div class="col-md-12">
				<br><br>
				<p>&copy; 2016 | <a href="http://www.mennovanderkrift.com" target="_blank"> Menno van der Krift</a> en Mike Oerlemans</p>
			</div>
		</div>
	</div>
	

<script>
var url = window.location.href;
var index = url.lastIndexOf("/") + 1;
var filename = url.substr(index);

if (filename == '') {
	var filename = 'Home';
}

$(document).ready(function(){
	$(document).prop('title', 'Movie database web app | ' + filename)
});
</script>
</body>
</html>