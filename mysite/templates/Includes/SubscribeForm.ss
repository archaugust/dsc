<% if $IncludeFormTag %>
<form $AttributesHTML>
<% end_if %>
	<% if $Message %>
	<p id="{$FormName}_error" class="message $MessageType">$Message</p>
	<% else %>
	<p id="{$FormName}_error" class="message $MessageType" style="display: none"></p>
	<% end_if %>

	<% if $Legend %><legend>$Legend</legend><% end_if %>
	<% loop $Fields %><% if $Title != "Security ID" %><div class="o-layout__item u-1/3@desktop u-1/1@mobile u-pl-35"><input $AttributesHTML /></div><% else %><input $AttributesHTML /><% end_if %><% end_loop %><% loop $Actions %><div class="o-layout__item u-1/3@desktop u-1/1@mobile u-pl-35">
		$Field
	</div><% end_loop %>

<% if $IncludeFormTag %>
</form>
<% end_if %>
