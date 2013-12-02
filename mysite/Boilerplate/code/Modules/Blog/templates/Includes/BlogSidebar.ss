<section id="sidebar" class="col-xs-12 col-sm-3">
    <aside class="sidebar-nav widget">
        <ul>
            <li><h4>$MenuTitle.XML</h4></li>
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
</section><!-- /#sidebar .col-xs-12 col-sm-3 -->