<% if $UseButtonTag %>
	<button class="btn btn-primary btn-lg" $AttributesHTML>
		<% if $ButtonContent %>$ButtonContent<% else %>$Title<% end_if %>
	</button>
<% else %>
	<input class="btn btn-primary btn-lg" $AttributesHTML />
<% end_if %>