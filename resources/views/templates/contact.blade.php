
<!-- contact info -->
<div class="col-md-5 offset-md-1 contact-info col-push">	
	@if (isset($contact) != null)
		<div class="section-title left">
			<h2>{{ $contact->titre}}</h2>
		</div>
		<p>{{$contact->texte}}</p>
		<h3 class="mt60">{{$contact->sous_titre}}</h3>
		<p class="con-item">{{$contact->adresse}} <br> {{$contact->localite}} </p>
		<p class="con-item">{{$contact->numero_gsm}}</p>
		<p class="con-item">{{$contact->email}}</p>
	@else
		<div class="section-title left">
			<h2>Contact us</h2>
		</div>
		<p>Cras ex mauris, ornare eget pretium sit amet, dignissim et turpis. Nunc nec maximus dui, vel suscipit dolor. Donec elementum velit a orci facilisis rutrum. </p>
		<h3 class="mt60">Main Office</h3>
		<p class="con-item">C/ Libertad, 34 <br> 05200 Arévalo </p>
		<p class="con-item">0034 37483 2445 322</p>
		<p class="con-item">hello@company.com</p>
	@endif
	
</div>
<!-- contact form -->
