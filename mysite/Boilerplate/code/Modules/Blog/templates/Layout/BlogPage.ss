<% if $Menu(2) %><div class="row"><% end_if %>

    <div class="hidden-xs"><% include SideBar %></div><!-- /.hidden-xs -->

    <% if $Menu(2) %><div class="col-xs-12 col-sm-9"><% end_if %>
        <article>
            <% if $BlogImage %>
                <p>$BlogImage.setWidth(850)</p>
            <% end_if %>
            <div class="page-header">
                <h1>$Title</h1>
            </div><!-- /.page-header -->
            <% if $Date && $Author %>
                <p><i>Posted on $Date.Nice by $Author</i></p>
            <% end_if %>
            <div class="content">$Content</div><!-- /.content -->
        </article>
        $Form
        $PageComments
    <% if $Menu(2) %></div><!-- /.col-xs-12 col-sm-9 --><% end_if %>

    <div class="visible-xs"><% include SideBar %></div><!-- /.hidden-xs -->

<% if $Menu(2) %></div><!-- /.row --><% end_if %>