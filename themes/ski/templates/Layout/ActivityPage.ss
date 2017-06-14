<section id="content" role="main">
<article>
<div class="o-wrapper o-activity-page u-pv-lg">
	<div class="o-layout u-ml-60">
		<div class="o-layout__item u-1/2@desktop u-1/1@tablet u-pl-60">
			<h1>$Title</h1>
			<div class="o-date">$Date.Long</div>
			<div class="o-share"><a href="https://www.facebook.com/sharer.php?u=$AbsoluteLink&title=$Title"><i class="fa fa-facebook"></i>&nbsp; Share on Facebook</a></div>
			$Content
		</div><div class="o-layout__item u-1/2@desktop u-1/1@tablet u-pl-60 o-images">
			$Photo.SetWidth(700)
			<% loop AdditionalPhotos %>
				$Photo.SetWidth(700)
			<% end_loop %>
		</div>
	</div>
</div>
</article>
</section>