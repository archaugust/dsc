<section id="banner">
	<figure class="banner">
   		<img src="$Banner.SetWidth(1900).URL" alt="$BannerButtonText" />
	</figure>
</section>

<section id="content" role="main">
<div class="o-wrapper u-pv-lg u-text-center">
	<div class="u-ph-lg o-intro">
		$Content
	</div>
</div>

<div class="o-testimonials">
	<div class="o-wrapper u-text-center">
		<div class="u-ph-lg">$TestimonialsIntro</div>
		<div id="slideshow" class="carousel slide" data-ride="carousel">
		  <div class="carousel-inner" role="listbox">
			<% loop Testimonials %>
		    <div class="item<% if $First %> active<% end_if %> u-ph-md">
    			<div class="carousel-caption">
			        <b>$Title</b>
			        <div>$Content</div>
			        <i>$Name</i>
		        </div>
		    </div>
		    <% end_loop %>
		  </div>
		
		  <a class="left carousel-control" data-target="#slideshow" role="button" data-slide="prev">
		    <img src="$ThemeDir/images/arrow-left.png" alt="Previous" class="icon-prev" aria-hidden="true" />
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" data-target="#slideshow" role="button" data-slide="next">
		    <img src="$ThemeDir/images/arrow-right.png" alt="Next" class="icon-next" aria-hidden="true" />
		    <span class="sr-only">Next</span>
		  </a>
		</div>
	</div>
</div>
<div class="o-wrapper u-pv-lg u-text-center">
	<div class="u-ph-md">
		$ContentBottom
	</div>
</div>
<div id="map"></div>
</section>

<script>
function initMap() {
	var dsc = new google.maps.LatLng($MapLat, $MapLng);
	var map = new google.maps.Map(document.getElementById('map'), {
		zoom: $MapZoom,
		center: dsc,
		scrollwheel: false,
	});
	
	var marker = new google.maps.Marker({
		position: dsc,
		map: map,
	});
}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDcV6k3cGYqleEGCBXdcED83l7Ylsoj6k&callback=initMap"></script>