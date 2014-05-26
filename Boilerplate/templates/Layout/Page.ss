<% include PageHeader %>
<div class="container">
    <% if $Menu(2) && $HideSidebar != 1 %><div class="row"><% end_if %>
        <% if $HideSidebar != 1 %><% include SideBar %><% end_if %>
        <% if $Menu(2) && $HideSidebar != 1 %><div class="col-xs-12 col-sm-9"><% end_if %>
            <% include Content %>
        <% if $Menu(2) %></div><!-- /.col-xs-12 col-sm-9 --><% end_if %>
    <% if $Menu(2) && $HideSidebar != 1 %></div><!-- /.row --><% end_if %>
</div><!-- /.container -->
<% include PageItems %>