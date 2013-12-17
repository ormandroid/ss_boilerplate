<% include PageHeader %>

<div class="container">

    <div id="Content" class="searchResults">
        <% if $Query %>
            <p class="searchQuery"><% sprintf(_t('PageResults.SearchHeading', 'You searched for "%s"'), $Query) %></p>
        <% end_if %>
        <% if $Results %>
            <div id="SearchResults">
                <% loop $Results %>
                <div class="well">
                    <h4>
                        <a href="$Link">
                            <% if $MenuTitle %>
                            $MenuTitle
                            <% else %>
                            $Title
                            <% end_if %>
                        </a>
                    </h4>
                    <% if $Content %>
                    <p>$Content.LimitWordCountXML</p>
                    <% end_if %>
                    <a class="readMoreLink" href="$Link"><% sprintf(_t('PageResults.ReadMoreText', 'Read more about "%s"...'), $Title) %></a>
                </div><!-- /.well -->
                <% end_loop %>
            </div><!-- /#searchResults -->
        <% else %>
            <p><% _t('PageResulkts.NoResultsText', 'Sorry, your search query did not return any results.') %></p>
        <% end_if %>
        <% if $Results.MoreThanOnePage %>
        <div id="PageNumbers">
            <ul class="pagination">
                <% if $Results.NotFirstPage %>
                    <li><a href="$Results.PrevLink" title="Previous">&larr;</a></li>
                <% end_if %>
                <% loop $Results.Pages %>
                    <% if $CurrentBool %>
                        <li class="active"><span>$PageNum</span></li>
                    <% else %>
                        <li><a href="$Link" title="Page $PageNum">$PageNum</a></li>
                    <% end_if %>
                <% end_loop %>
                <% if $Results.NotLastPage %>
                    <li><a href="$Results.NextLink" title="Next">&rarr;</a></li>
                <% end_if %>
            </ul><!-- /.pagination -->
            <p>Page $Results.CurrentPage of $Results.TotalPages</p>
        </div><!-- /#pageNumbers -->
        <% end_if %>
    </div><!-- /#content .searchResults -->

</div><!-- /.container -->