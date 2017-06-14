<section id="content" role="main">
<div class="o-wrapper u-pv-lg">
	<div class="o-intro u-text-center">
		$Content
	</div>
	<% loop $Children %>
	<div class="o-activity">
		$Photo.CroppedImage(300,300)
		<div>
			<h2>$Title</h2>
			<div class="o-date">$Date.Long</div>
			<div>$Content.Summary</div>
			<a href="$Link" class="c-btn">Find Out More</a>
		</div>
	</div>
	<% end_loop %>
</div>
</section>