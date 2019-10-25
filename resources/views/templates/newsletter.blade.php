	<!-- newsletter section -->
	<div class="newsletter-section spad">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<h2>Newsletter</h2>
				</div>
				<div class="col-md-9">
					@if (Session::has('newsletter') != null)
						<div class="alert alert-success" id="newsletter">Merci de votre message.</div>
					@endif
					<!-- newsletter form -->
					<form class="nl-form" action="{{url('/newsletter')}}" method="POST">
						@csrf
						@method('post')
						<input type="email" placeholder="Your e-mail here" name="mail" class="mx-0">
						<button class="site-btn btn-2">Newsletter</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- newsletter section end-->