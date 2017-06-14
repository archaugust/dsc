<% if $Banner %> 
<section id="banner">
	<figure class="banner">
   		<img src="$Banner.SetWidth(1900).URL" alt="$BannerButtonText" />
	</figure>
</section>
<% end_if %>

<section id="content" role="main">
<div class="o-wrapper u-pv-lg">
	<div class="u-ph-lg o-intro">
		$Content
	</div>
</div>
</section>