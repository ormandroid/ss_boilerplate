<section class="sidebar col-xs-12 col-sm-4 col-lg-3">
    <aside class="sidebar-nav widget">

        <h4>$MenuTitle.XML</h4>

        <% if $BlogSidebarContent || $Parent.BlogSidebarContent %>
            <aside class="blog-sidebar-content">
                $BlogSidebarContent
                $Parent.BlogSidebarContent
            </aside><!-- /.blog-sidebar-content -->
        <% end_if %>

        <ul>
            <% if $AllChildren %>
                <% loop $AllChildren.Limit(10) %>
                    <li class="$LinkingMode">
                        <a href="$Link" class="$LinkingMode" title="$Title.XML">
                            $MenuTitle.XML
                        </a>
                    </li>
                <% end_loop %>
            <% else %>
                <% loop $Parent.AllChildren.Limit(10) %>
                    <li class="$LinkingMode">
                        <a href="$Link" class="$LinkingMode" title="$Title.XML">
                            $MenuTitle.XML
                        </a>
                    </li>
                <% end_loop %>
            <% end_if %>
        </ul>

        <% if $PaginatedPages %><% else %>
            <% include Sharer %>
        <% end_if %>

    </aside><!-- /.sidebar-nav -->
</section><!-- /.sidebar col-xs-12 col-sm-3 -->