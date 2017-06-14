<section id="banner">
	<figure class="banner-textured">
   		<img class="banner-image" src="$Banner.SetWidth(1900).URL" alt="$BannerButtonText" />
   		<img class="overlay" src="$Themedir/images/texture-bottom.png" />
   		<figcaption>
   			<div class="o-wrapper o-box--flush o-block--right u-hidden-xs">
   				<a href="$BannerButtonLink" class="c-btn c-btn--primary">$BannerButtonText</a>
   			</div>
   		</figcaption>
	</figure>
</section>

<section id="content-top" class="o-intro">
	<div class="o-wrapper">
		$Content
	</div>
</section>

<section id="sub-intro">
	<div class="o-layout o-layout--flush u-textured-top">
		<img class="overlay u-hidden-xs" src="$ThemeDir/images/texture-top.png" />
		<div class="o-layout__item u-1/2@desktop u-1/1@mobile">
			<figure class="sub-intro">
				<a href="$SubIntroLeftLink">
				<img class="sub-intro-image" src="$SubIntroLeftImage.setWidth(950).URL" alt="$SubIntroLeftTitle" />
				<figcaption>
					<div> 
						<h3>
							<span class="u-hidden-xs">$SubIntroLeftTitle</span>
							<span class="u-visible-xs">$SubIntroLeftTitleMobile</span>
						</h3>
						<p>$SubIntroLeftText</p>
					</div>
				</figcaption>
				</a>
			</figure>
		</div><div class="o-layout__item u-1/2@desktop u-1/1@mobile">
			<figure class="sub-intro">
				<a href="$SubIntroRightLink">
				<img src="$SubIntroRightImage.setWidth(950).URL" alt="$SubIntroRightTitle" />
				<figcaption>
					<div>
						<h3>
							<span class="u-hidden-xs">$SubIntroRightTitle</span>
							<span class="u-visible-xs">$SubIntroRightTitleMobile</span>
						</h3>
						<p>$SubIntroRightText</p>
					</div>
				</figcaption>
				</a>
			</figure>
		</div>
	</div>
</section>

<section id="content" role="main" class="u-hidden-xs">
<div class="o-wrapper">

	<div id="slideshow" class="carousel slide" data-ride="carousel">
	  <ol class="carousel-indicators">
	    <% loop ListPagesByType('ActivityPage') %>
	    <li data-target="#slideshow" data-slide-to="$Pos(0)"<% if $First %>class="active"<% end_if %>></li>
	    <% end_loop %>
	  </ol>
	
	  <div class="carousel-inner" role="listbox">
	  <% loop ListPagesByType('ActivityPage') %>
	    <div class="item<% if $First %> active<% end_if %>">
	    	<div class="o-layout o-layout--flush">
	    		<div class="o-layout__item u-1/2@desktop u-1/1@mobile">
	    			<div class="carousel-caption">
				        <a href="$Link"><h3>$Title</h3></a>
				        <div class="date">$Date.Long</div>
				        <div class="summary">$Content.Summary(50,15)</div>
			        </div>
			    </div><div class="o-layout__item u-1/2@desktop u-1/1@mobile">
			      <a href="$Link">$Photo.CroppedImage(728,485)</a>
			    </div>
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
</section>

<section id="subscribe">
	<figure class="subscribe">
		<img class="subscribe-image" src="$SubscribeImage.SetWidth(1900).URL" alt="Subscribe" />
		<figcaption>
			<div class="o-wrapper">
				<h3>$SubscribeTitle</h3>
				<div class="subscribe-text">$SubscribeText</div>
				<div class="subscribe-form">
					<div class="o-layout u-ml-35">
						$SubscribeForm
					</div>
				</div>
				<div id="msgDiv"></div>
			</div>
		</figcaption>
	</figure>
</section>

<section id="instagram">
	<div class="o-wrapper">
		<div class="instagram-header">
			<a href="https://www.instagram.com/disabled_snowsports_canterbury/" target="_blank">
				<img src="$Themedir/images/icon-instagram.png" alt="Instagram" />
				<span>@disabled_snowsports_canterbury</span>
			</a>
		</div>
		<div id="instafeed" class="o-layout u-ml-35"></div>
	</div>
</section>

<section id="sponsors">
	<div class="o-wrapper sponsors">
		<h3>Thanks to our generous sponsors</h3>
		<div>
			<a href="http://www.pubcharitylimited.org.nz/" target="_blank"><img src="$Themedir/images/sponsors/pub-charity.png" alt="Pub Charity" /></a>
			<a href="http://www.ratafoundation.org.nz/" target="_blank"><img src="$Themedir/images/sponsors/rata-foundation.png" alt="Rata Foundation" /></a>
		</div>
		<div>
			<a href="#"><img src="$Themedir/images/sponsors/the-lamar-trust.png" alt="Lamar Trust" /></a>
			<a href="https://www.ccc.govt.nz/" target="_blank"><img src="$Themedir/images/sponsors/christchurch-city-council.png" alt="Christchurch City Council" /></a>
			<a href="http://www.bloggcharitabletrust.co.nz/" target="_blank"><img src="$Themedir/images/sponsors/blogg.png" alt="Blogg Charitable Trust" /></a>
		</div>
	</div>
</section>