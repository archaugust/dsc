<section id="content" role="main">
<div class="o-wrapper u-pv-lg u-text-center">
	<div class="u-ph-lg">
		$Content
	</div>
	<% loop Sections %>
		<div class="o-section<% if $Even %> even<% end_if %>">
			$Photo.SetWidth(500)
			<div>
				<h3>$Title</h3>
				$Content
			</div>
		</div>
	<% end_loop %>
	
	<div id="membership-form" class="o-membership-intro">
		$MembershipFormIntro
	</div>
	<div class="o-membership-form">
	$MembershipForm
	<hr />
	$ContentBottom
	</div>
</div>
</section>