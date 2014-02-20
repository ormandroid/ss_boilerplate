<% include PageHeader %>

<div class="container">

    <% if $Menu(2) %><div class="row"><% end_if %>

        <% include SideBar %>

        <% if $Menu(2) %><div class="col-xs-12 col-sm-9"><% end_if %>
            <article>
                <aside class="content typography">
                    $Content
                    $Form
                    $PageComments
                </aside><!-- /.content typography -->
            </article>

            <div class="memberLinks">
                <% if $CurrentMember %>
                    <% loop $CurrentMember %>
                        <a id="editProfile" class="btn btn-secondary" href="$Link">Edit Profile</a>
                    <% end_loop %>
                <% else %>
                    <a href="$Page(register).Link">Register</a>
                <% end_if %>
            </div><!-- /.memberLinks -->

        <% if $Menu(2) %></div><!-- /.col-xs-12 col-sm-9 --><% end_if %>

    <% if $Menu(2) %></div><!-- /.row --><% end_if %>

</div><!-- /.container -->

<% include PageItems %>