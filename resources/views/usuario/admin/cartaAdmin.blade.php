<?php use App\Http\Controllers\UserController; $admin = UserController::getUser(1);?>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v5.0"></script>
<div class="col-md-12 col-lg-4 sidebar">
	<!-- END sidebar-box -->
	<div class="sidebar-box">
		<div class="bio text-center">
			<img src="../images/perfiles/<?= $admin->imagen ?>" style="border-radius: 50%;" height="105" width="120">
			<div class="bio-body">
				<h2><?= $admin->nombre ?></h2>&nbsp;
				<h5 class="category">Administrador</h5>
				<p>Escantado de que te pongas en contacto conmigo</p>
				<p class="social">
					<a href="https://twitter.com/CarlosRobles?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false">Follow @TwitterDev</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script><br>
					<script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script><iframe src="//lightwidget.com/widgets/ad607dc877d55ed0a83d902a4414bcf9.html" scrolling="yes" allowtransparency="true" class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe><br>
					<div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-width="243" data-height="343" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div>
				</p>
			</div>
		</div>
	</div>
	<!-- END sidebar-box -->            
</div>