<section id="sidebar" class="col-xs-12 col-sm-3">
    <aside class="sidebar-nav widget">
        <ul>
            <% loop $Menu(1) %>
                <% if AllChildren %>
                    <li><h4>$MenuTitle.XML</h4></li>
                <% end_if %>
                <% if $AllChildren %>
                    <% loop $AllChildren %>
                        <li class="$LinkingMode">
                            <a href="$Link" class="$LinkingMode" title="$Title.XML">
                                $MenuTitle.XML
                            </a>
                        </li>
                    <% end_loop %>
                <% end_if %>
            <% end_loop %>
        </ul>
    </aside><!-- /.sidebar-nav -->
</section><!-- /#sidebar .col-xs-12 col-sm-3 -->