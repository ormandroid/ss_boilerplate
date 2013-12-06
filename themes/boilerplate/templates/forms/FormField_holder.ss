<div id="$Name" class="field form-group">
	<% if $Title %><label class="left" for="$ID">$Title</label><% end_if %>
    $Field
	<% if $RightTitle %><label class="right" for="$ID">$RightTitle</label><% end_if %>
	<% if $Message %><span class="message $MessageType">$Message</span><% end_if %>
	<% if $Description %><span class="description">$Description</span><% end_if %>
</div><!-- /.field form-group -->