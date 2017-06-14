<% if $UseButtonTag %>
	<button id="recaptchaButton" class="c-btn c-btn--primary">
		<% if $ButtonContent %>$ButtonContent<% else %>$Title.XML<% end_if %>
	</button> <div id="msgDiv"></div>
<% else %>
	<input $AttributesHTML />
<% end_if %>