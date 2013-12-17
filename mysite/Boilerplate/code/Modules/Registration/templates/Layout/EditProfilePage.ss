<% include PageHeader %>

<div class="container">

    <% if $Menu(2) %><div class="row"><% end_if %>

        <div class="hidden-xs"><% include SideBar %></div><!-- /.hidden-xs -->

        <% if $Menu(2) %><div class="col-xs-12 col-sm-9"><% end_if %>
            <article>
                <aside class="content typography">

                    <% if Success %>
                        <div class="alert alert-success">
                            <i class="fa fa-check"></i> You have successfully registered!
                        </div><!-- /.alert alert-success -->

                        <div class="panel panel-primary">
                            <div class="panel-heading">Your details are as follows:</div>
                            <table class="table">
                                <% loop CurrentMember %>
                                    <tr>
                                        <td>Name:</td>
                                        <td>$FirstName</td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td>$Email</td>
                                    </tr>
                                    <tr>
                                        <td>Website:</td>
                                        <td><% if Website %>$Website<% end_if %></td>
                                    </tr>
                                    <tr>
                                        <td>Job Title:</td>
                                        <td><% if JobTitle %>$JobTitle<% end_if %></td>
                                    </tr>
                                    <tr>
                                        <td>Blurb:</td>
                                        <td><% if Blurb %>$Blurb<% end_if %></td>
                                    </tr>
                                <% end_loop %>
                            </table><!-- /.table -->
                        </div><!-- /.panel panel-primary -->

                        <a class="btn btn-secondary" href="$Link">Edit details</a>

                    <% else %>
                        <% if Saved %>
                            <div class="alert alert-success">
                                <i class="fa fa-check"></i> Your profile has been saved!
                            </div><!-- /.alert alert-success -->
                        <% end_if %>
                        $EditProfileForm
                    <% end_if %>

                    <% include PageWidgets %>

                </aside><!-- /.content typography -->
            </article>
            $Form
            $PageComments
        <% if $Menu(2) %></div><!-- /.col-xs-12 col-sm-9 --><% end_if %>

        <div class="visible-xs"><% include SideBar %></div><!-- /.hidden-xs -->

    <% if $Menu(2) %></div><!-- /.row --><% end_if %>

</div><!-- /.container -->