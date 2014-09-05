<% include PageHeader %>

<div class="container">
    <% include Content %>
    <% if $AllChildren %>
        <section class="food-menu grid loop">
            <% loop $AllChildren %>
                <section class="category">
                    <h2 class="heading">$MenuTitle</h2>
                    <div class="row">
                    <% loop $AllChildren %>
                        <article class="item col-xs-12 col-sm-6 $FirstLast $EvenOdd">
                            <div class="content typography">
                                <% if $Image %>
                                    <a href="$Link" class="image" title="<%t MenuHolder.ReadMore "Read more on &quot;{Title}&quot;" Title=$Title %>">
                                        $Image.CroppedImage(848, 340)
                                    </a><!-- /.image -->
                                <% end_if %>
                                <h3 class="heading">
                                    <a href="$Link" title="<%t MenuHolder.ReadMore "Read more on &quot;{Title}&quot;" Title=$Title %>">$MenuTitle.XML</a>
                                </h3><!-- /.heading -->
                                <div class="summary">
                                    <p>$Content.LimitWordCountXML(40)</p>
                                </div><!-- /.summary -->
                                <% if $Ingredients %>
                                    <div class="ingredients">
                                        $Ingredients
                                    </div><!-- /.summary -->
                                <% end_if %>
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
                            </div><!-- /.content typography -->
                        </article><!-- /.item -->
                        <% if $MultipleOf(2) %>
                            <div class="clearfix"></div><!-- /.clearfix -->
                        <% end_if %>
                    <% end_loop %>
                    </div><!-- /.row -->
                </section><!-- /.category -->
            <% end_loop %>
        </section><!-- /.food-menu grid loop -->
    <% end_if %>
</div><!-- /.container -->