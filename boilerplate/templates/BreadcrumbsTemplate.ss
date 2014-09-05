<% if $Pages %>
    <% loop $Pages %>
        <li<% if $Last %> class="active"<% end_if %>>
            <% if $Last %>
                $MenuTitle.XML
            <% else %>
                <a href="$Link">$MenuTitle.XML</a>
            <% end_if %>
        </li>
    <% end_loop %>
<% end_if %>