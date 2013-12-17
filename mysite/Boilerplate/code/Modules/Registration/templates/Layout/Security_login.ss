<% include PageHeader %>

<div class="container">

    <% if $Menu(2) %><div class="row"><% end_if %>

        <div class="hidden-xs"><% include SideBar %></div><!-- /.hidden-xs -->

        <% if $Menu(2) %><div class="col-xs-12 col-sm-9"><% end_if %>
            <article>
                <aside class="content typography">
                    $Content
                    <% include PageWidgets %>
                </aside><!-- /.content typography -->
            </article>
            $Form

            <div class="memberLinks">
                <% if CurrentMember %>
                    <% loop CurrentMember %>
                        <a id="editProfile" class="btn btn-secondary" href="$Link">Edit Profile</a>
                    <% end_loop %>
                <% else %>
                    <a href="$Page(register).Link">Register</a>
                <% end_if %>
            </div><!-- /.memberLinks -->

            $PageComments
        <% if $Menu(2) %></div><!-- /.col-xs-12 col-sm-9 --><% end_if %>

        <div class="visible-xs"><% include SideBar %></div><!-- /.hidden-xs -->

    <% if $Menu(2) %></div><!-- /.row --><% end_if %>

</div><!-- /.container -->