<?php if(!empty($pelicula->trailer)){ ?>
	<object width="825" height="550" data="<?= $pelicula->trailer ?>" type="application/x-shockwave-flash"><param name="src" value="<?= $pelicula->trailer ?>" /></object>
<?php } ?>