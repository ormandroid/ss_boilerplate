<% include PageHeader %>

<div class="container">
    <% include Content %>
    <% if $AllChildren %>
        <section class="food-menu loop">
            <div class="row">
                <% loop $AllChildren %>
                    <section class="category col-xs-12">
                        <h2 class="heading">$MenuTitle.XML</h2><!-- /.heading -->
                        <% loop $AllChildren %>
                            <article class="item">
                                <div class="row">
                                    <div class="col-xs-3 col-sm-2">
                                        <% if $Image %><a href="{$Link}" class="image" alt="{$Title}" title="{$Title}">$Image.croppedImage(200, 200)</a><% end_if %>
                                    </div><!-- /.col-xs-3 col-sm-2 -->
                                    <div class="col-xs-9 col-sm-8">
                                        <a href="{$Link}" title="{$Title}" class="heading">{$MenuTitle.XML}</a><!-- /.heading -->
                                        <div class="summary">
                                            <p>$Content.LimitWordCountXML(40)</p>
                                        </div><!-- /.summary -->
                                        <% if $Ingredients %>
                                            <div class="ingredients">
                                                <p>$Ingredients</p>
                                            </div><!-- /.summary -->
                                        <% end_if %>
                                    </div><!-- /.col-xs-9 col-sm-8 -->
                                    <div class="col-xs-offset-3 col-xs-4 col-sm-offset-0 col-sm-2">
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
                                    </div><!-- /.col-xs-offset-3 col-xs-4 col-sm-offset-0 col-sm-2 -->
                                </div><!-- /.row -->
                            </article><!-- /.item -->
                        <% end_loop %>
                    </section><!-- /.category col-xs-12 -->
                <% end_loop %>
            </div><!-- /.row -->
        </section><!-- /.food-menu loop -->
    <% end_if %>
</div><!-- /.container -->