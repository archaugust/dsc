<section id="footer">
	<div class="o-footer">
		<div class="o-wrapper o-footer-top">
			<div class="o-layout">
				<div class="o-layout__item u-1/3@desktop u-1/1@mobile">
					<h3>Contact Us</h3>
					$Contact.Footer1
				</div><div class="o-layout__item u-1/3@desktop u-1/1@mobile">
					<h3 class="u-hidden-xs">&nbsp;</h3>
					$Contact.Footer2
				</div><div class="o-layout__item u-1/3@desktop u-1/1@mobile ">
					<h3>Website Links</h3>
		    		<ul class="o-list-bare">
			          	<% loop $Menu(1) %>
		          		<li>
				            <a class="$LinkingMode" href="$Link">$MenuTitle</a>
						</li>
			            <% end_loop %>
		    		</ul>
				</div>
			</div>
			<div class="social">
				<a href="https://www.facebook.com/dsscanterbury/" target="_blank"><i class="fa fa-facebook"></i>
				<div>
					Follow Us<br />
					on Facebook
				</div>
				</a>
			</div>
		</div>
		
		<div class="o-footer-bottom">
			<div class="o-wrapper">
				<div class="o-layout">
					<div class="o-layout__item u-1/4@desktop u-1/3@tablet u-1/1@mobile">
						<a href="/terms-and-conditions">Terms & Conditions</a>
					</div><div class="o-layout__item u-1/2@desktop u-1/3@tablet u-1/1@mobile u-text-center">
						&copy; 2017 Copyright Disabled Snowsports Canterbury
					</div><div class="o-layout__item u-1/4@desktop u-1/3@tablet u-1/1@mobile u-text-right website">
						<a href="http://spinifexnz.com" target="_blank">
						Website by <b>Spinifex</b>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>

$Contact.EmailScript