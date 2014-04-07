<% include PageHeader %>

<div class="container">

    <section class="search-results">
        <article class="content typography">
            <h1><i class="fa fa-search"></i> Search</h1>
            <% if $Query %>
                <p class="alert alert-info"><%t PageResults.SearchHeading 'You searched for "{Title}"' Title=$Query %></p>
            <% end_if %>
        </article><!-- /.content typography -->
        <% if $Results %>
            <div class="results-loop">
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
                    <a class="readMoreLink" href="$Link"><%t PageResults.ReadMoreText 'Read more about "{Title}"' Title=$Title %></a>
                </div><!-- /.well -->
                <% end_loop %>
            </div><!-- /.results-loop -->
        <% else %>
            <p class="alert alert-warning"><%t PageResults.NoResultsText 'Sorry, your search query did not return any results.' %></p>
        <% end_if %>

        <% if $Results.MoreThanOnePage %>
            <ul class="pagination">
                <% if $Results.NotFirstPage %>
                    <li><a class="prev" href="$Results.PrevLink"><%t Pagination.PrevText 'Prev' %></a></li>
                <% end_if %>
                <% loop $Results.Pages %>
                    <% if $CurrentBool %>
                        <li class="active"><span>$PageNum</span></li><!-- /.active -->
                    <% else %>
                        <% if $Link %>
                            <li><a href="$Link">$PageNum</a></li>
                        <% else %>
                            <li><%t Pagination.Ellipsis '...' %></li>
                        <% end_if %>
                    <% end_if %>
                <% end_loop %>
                <% if $Results.NotLastPage %>
                    <li><a class="next" href="$Results.NextLink"><%t Pagination.NextText 'Next' %></a></li>
                <% end_if %>

                <%--<li class="disabled"><span>$PaginatedPages.CurrentPosition</span></li>--%>

            </ul><!-- /.pagination -->
        <% end_if %>

    </section><!-- /.search-results -->

</div><!-- /.container -->