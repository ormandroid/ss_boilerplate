<% if $Menu(2) %>
    <section class="sidebar col-xs-12 col-sm-3">
        <aside class="sidebar-nav widget">
            <ul>
                <% loop $Menu(1) %>
                    <% if Children %>
                        <li><h4>$MenuTitle.XML</h4></li>
                    <% end_if %>
                    <% include SidebarMenu %>
                <% end_loop %>
            </ul>
        </aside><!-- /.sidebar-nav -->
    </section><!-- /.sidebar col-xs-12 col-sm-3 -->
<% end_if %>