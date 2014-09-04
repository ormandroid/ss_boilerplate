<% include PageHeader %>
<section class="food-item page container">
    <div class="row">
        <div class="col-xs-12 col-sm-5">
            <div class="image">$Image.setWidth(500)</div><!-- /.image -->
        </div><!-- /.col-xs-12 col-sm-5 -->
        <div class="col-xs-12 col-sm-7">
            <div class="price">
                <span class="main">$Price.Nice</span><!-- /.main -->
                <% if $MenuVariations %>
                    <ul class="variations">
                        <% loop $MenuVariations %>
                            <li>{$Title} - {$Price.Nice}</li>
                        <% end_loop %>
                    </ul><!-- /.variations -->
                <% end_if %>
            </div><!-- /.price -->
            <% include Content %>
            <% if $Ingredients %>
                <div class="ingredients">
                    $Ingredients
                </div><!-- /.summary -->
            <% end_if %>
        </div><!-- /.col-xs-12 col-sm-7 -->
    </div><!-- /.row -->
</section><!-- /.food-item page container -->