<% if $UseButtonTag %>
	<button class="btn btn-primary" $AttributesHTML>
		<% if $ButtonContent %>$ButtonContent<% else %>$Title<% end_if %>
	</button>
<% else %>
	<input class="btn btn-primary" $AttributesHTML />
<% end_if %>