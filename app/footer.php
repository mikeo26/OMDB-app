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

jQuery(document).ready(function($){
    // Get current url
    // Select an a element that has the matching href and apply a class of 'active'. Also prepend a - to the content of the link
    var url = window.location.href;
$('.nav a').filter(function() {
    return this.href == url;
}).parent().addClass('active');
$("#registerForm").validate({
	rules: {
		herhaalwachtwoord: {
			equalTo: "#wachtwoord"
		}
	}
});
$("#loginForm").validate();
});


</script>
</body>
</html>