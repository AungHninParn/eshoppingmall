@extends('frontend.master')
@section('content')

<div class="container ">
	<h1 class="text-center">Tell us What You Know</h1>
		<div class="row">
			<div class="col lg-6 col-md-12 col-sm-12">
				<form>
					<div class="form-group">

						<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Your Name">
					</div>
					<div class="form-group">

						<input type="email" class="form-control" id="exampleInputPassword1" placeholder="Your Email">
					</div>
					<div class="form-group">

						<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Subject">
					</div>


					<textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Your Comment"></textarea>
					<div class="d-lg-block d-none"><a href="#" class="btn mt-3" id="event-btn">Send Message</a></div>
				</form>




			</div>
			<div id="map-container-google-3" class="z-depth-1-half map-container-3 mt-3">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60083.04130283781!2d96.05338941952553!3d19.747077131844147!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c8bee4e3f117c1%3A0xd090ab50c9c24eda!2sNaypyitaw!5e0!3m2!1sen!2smm!4v1592037053487!5m2!1sen!2smm" width="1150" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
			</div>
			
		</div>
	</div>
@endsection