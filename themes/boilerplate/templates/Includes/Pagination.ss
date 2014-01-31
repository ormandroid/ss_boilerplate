<% if $PaginatedPages.MoreThanOnePage %>
    <ul class="pagination">
        <% if $PaginatedPages.NotFirstPage %>
            <li><a class="prev" href="$PaginatedPages.PrevLink">Prev</a></li>
        <% end_if %>
        <% loop $PaginatedPages.Pages %>
            <% if $CurrentBool %>
                <li class="active"><span>$PageNum</span></li><!-- /.active -->
            <% else %>
                <% if $Link %>
                    <li><a href="$Link">$PageNum</a></li>
                <% else %>
                    <li>...</li>
                <% end_if %>
            <% end_if %>
        <% end_loop %>
        <% if $PaginatedPages.NotLastPage %>
            <li><a class="next" href="$PaginatedPages.NextLink">Next</a></li>
        <% end_if %>

        <%--<li class="disabled"><span>$PaginatedPages.CurrentPosition</span></li>--%>

    </ul><!-- /.pagination -->
<% end_if %>