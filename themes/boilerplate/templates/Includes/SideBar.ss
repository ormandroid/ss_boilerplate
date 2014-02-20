<% if $Menu(2) %>
    <section class="sidebar col-xs-12 col-sm-3 hidden-xs">
        <aside class="sidebar-nav widget">
            <ul>
                <% with $Level(1) %>
                    <% if $Children %>
                        <li><h4>$MenuTitle.XML</h4></li>
                    <% end_if %>
                    <% include SidebarMenu %>
                <% end_with %>
            </ul>
        </aside><!-- /.sidebar-nav -->
    </section><!-- /.sidebar col-xs-12 col-sm-3 hidden-xs -->
<% end_if %>