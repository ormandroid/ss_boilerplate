<section class="sidebar col-xs-12 col-sm-3">
    <aside class="sidebar-nav widget">

        <h4>$MenuTitle.XML</h4>

        <% if $BlogSidebarContent %>
            <aside class="blog-sidebar-content">
                $BlogSidebarContent
            </aside><!-- /.blog-sidebar-content -->
        <% end_if %>

        <ul>
            <% if $AllChildren %>
                <% loop $AllChildren %>
                    <li class="$LinkingMode">
                        <a href="$Link" class="$LinkingMode" title="$Title.XML">
                            $MenuTitle.XML
                        </a>
                    </li>
                <% end_loop %>
            <% end_if %>
        </ul>
    </aside><!-- /.sidebar-nav -->
</section><!-- /.sidebar col-xs-12 col-sm-3 -->