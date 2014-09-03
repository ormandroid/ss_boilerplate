<% include PageHeader %>
<div class="container">
    <% if $Menu(2) && $HideSidebar != 1 %>
        <div class="row">
            <% include SideBar %>
            <div class="col-xs-12 col-sm-9">
    <% end_if %>
                <% include Content %>
    <% if $Menu(2) && $HideSidebar != 1 %>
            </div><!-- /.col-xs-12 col-sm-9 -->
        </div><!-- /.row -->
    <% end_if %>
</div><!-- /.container -->
<% include PageItems %>