<?php include 'head.php'; ?>
	
	<div class="container">
		<div class="row">
			<?php if(isset($_SESSION['registered'])) { echo "<p class='text-success'>" . $_SESSION['registered'] . "</p>"; unset($_SESSION['registered']);} ?>

		</div>
		<div class="row">
			<div class="col-sm-8 col-md-8 col-lg-8">
				<h2>Example body text</h2>
				<p>Nullam quis risus eget <a href="#">urna mollis ornare</a> vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.</p>
				<p><small>This line of text is meant to be treated as fine print.</small></p>
				<p>The following snippet of text is <strong>rendered as bold text</strong>.</p>
				<p>The following snippet of text is <em>rendered as italicized text</em>.</p>
				<p>An abbreviation of the word attribute is <abbr title="attribute">attr</abbr>.</p>
				<p>Hier kan je het hele nieuwsoverzicht in zetten</p>
			</div>

			<div class="col-sm-4 col-md-4 col-lg-4">
				<h3>Aanbevolen films</h3>
				<div class="loading">
					<img src="assets/img/loading.gif" alt="Laden..." class="loading">
					<br>
					<p> Aanbevolen films aan het laden...</p>
				</div>
				<div id="aanbevolenFilmContent" class="aanbevolen-films"> <?php include 'assets/no-javascript.php'; ?></div>
			</div>
		</div>
	</div>

<?php include 'footer.php'; ?>