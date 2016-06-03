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
	$(document).prop('title', 'Movie database web app | ' + filename);
});

jQuery(document).ready(function($){
    // Get current url
    // Select an a element that has the matching href and apply a class of 'active'. Also prepend a - to the content of the link
    var url = window.location.href;
$('.nav a').filter(function() {
    return this.href == url;
}).parent().addClass('active');
$("#registerForm").validate({
	lang: 'nl',
	rules: {
		herhaalwachtwoord: {
			equalTo: "#wachtwoord"
		}
	}
});
$("#loginForm").validate();
$("#contactForm").validate();
$("#changePass").validate({
	rules: {
		newpass2: {
			equalTo: "#newpass1"
		}
	}
});

$("#wachtwoordform").validate({
	rules: {
		emailadres: {
			required: true,
			email: true
		}
	}
});

$("#form-zoeken").validate({
	rules: {
		
	}
});

	// CHANGE PASSWORD

	$("#submitNewPass").click(function(){
		var password1 = $("#newpass1").val();
		var password2 = $("#newpass2").val();

		if($("#newpass1").val().length < 6) {
			$("#newpass1Error").html("<p style='color:red;' class='text-danger'>Veld is niet correct ingevuld.</p>");
		}else if($("#newpass2").val().length < 6) {
			$("#newpass2Error").html("<p style='color:red;' class='text-danger'>Veld is niet correct ingevuld.</p>");
		}else if(password1 !== password2) {
			$("#newpass2Error").html("<p style='color:red;' class='text-danger'>De 2 wachtwoord velden zijn niet identiek.</p>");
		}else {
			$.post(
			"assets/changePass.php",
			{newpass1: password1, newpass2: password2},
			function(data) {
				var obj = JSON.parse(data);
				$(".statusMessage").html(obj.message);
			}
		);
		}


	});

	function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
};

	// CHANGE EMAIL

	$("#submitNewMail").click(function(){
		var email1 = $("#email1").val();
		var email2 = $("#email2").val();

		if(!$("#email1").val()) {
			$("#newmail1Error").html("<p style='color:red;' class='text-danger'>Veld is niet correct ingevuld.</p>");
		}else if(!isValidEmailAddress(email1)) {
			$("#newmail1Error").html("<p style='color:red;' class='text-danger'>U heeft geen correct e-mailadres ingevuld.</p>");
		}else if(email1 !== email2) {
			$("#newmail2Error").html("<p style='color:red;' class='text-danger'>De 2 ingevulde e-mailadressen komen niet overeen.</p>");	
		}else {
			$.post(
			"assets/changeMail.php",
			{newmail1: email1, newmail2: email2},
			function(data) {
				var obj = JSON.parse(data);
				$(".statusMessage").html(obj.message);
			}
		);
		}


	});
});


</script>
</body>
</html>