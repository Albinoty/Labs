
				<!-- contact info -->
				<div class="col-md-5 offset-md-1 contact-info col-push">
					<div class="section-title left">
						<h2>{{isset($contact) != null ? $contact->titre : ''}}</h2>
					</div>
					<p>{{isset($contact) != null ? $contact->texte : ''}}</p>
					<h3 class="mt60">{{isset($contact) != null ? $contact->sous_titre : ''}}</h3>
					<p class="con-item">{{isset($contact) != null ? $contact->adresse : ''}} <br> {{isset($contact) != null ? $contact->localite : ''}} </p>
					<p class="con-item">{{isset($contact) != null ? $contact->numero_gsm : ''}}</p>
					<p class="con-item">{{isset($contact) != null ? $contact->email : ''}}</p>
				</div>
				<!-- contact form -->
