<section id="banner">
	<figure class="banner">
   		<img src="$Banner.SetWidth(1900).URL" alt="$BannerButtonText" />
	</figure>
</section>

<section id="content" role="main">
<div class="o-wrapper u-pv-lg u-text-center">
	<div class="u-ph-lg">
		$Content
	</div>
	<h2 class="o-instructors">Instructors</h2>
	<% loop Instructors %>
		<div class="o-instructor<% if $Even %> even<% end_if %>">
			$Photo.SetWidth(390)
			<div>
				<h3>$Name</h3>
				$Description
			</div>
		</div>
	<% end_loop %>
</div>
</section>