<% if $SliderItems %><% else %>
    <header class="page-header">
        <div class="container">
            <h1>$Title</h1>
        </div><!-- /.container -->
    </header><!-- /.page-header -->
<% end_if %>
$FlashMessage
<% include Slider %>
<% include BreadCrumbs %>