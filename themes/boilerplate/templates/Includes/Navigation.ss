<div class="row">
    <div class="col-xs-8 col-sm-2">
        <% if SiteConfig.LogoImage %>
            <a id="logo-container" class="pull-left" href="$BaseHref" rel="home">
                $SiteConfig.LogoImage
            </a><!-- /.logo-container .pull-left -->
        <% else %>
            <div class="navbar-header">
                <a class="navbar-brand" href="$BaseHref" rel="home">
                    $SiteConfig.Title
                </a>
            </div>
        <% end_if %>
    </div><!-- /.col-xs-8 col-sm-2 -->
    <div class="col-xs-4 col-sm-10">
        <nav id="main-nav" class="navbar navbar-default" role="navigation">
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <% loop $Menu(1) %>
                        <% if Children %>
                            <li class="$LinkingMode dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">$MenuTitle.XML <i class="fa fa-caret-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li class="$LinkingMode"><a href="$Link" title="$Title.XML">$MenuTitle.XML</a></li>
                                    <% loop Children %>
                                        <li class="$LinkingMode"><a href="$Link" title="$Title.XML">$MenuTitle.XML</a></li>
                                    <% end_loop %>
                                </ul><!-- /.dropdown-menu -->
                            </li><!-- /.dropdown -->
                        <% else %>
                            <li class="$LinkingMode"><a href="$Link" title="$Title.XML">$MenuTitle.XML</a></li>
                        <% end_if %>
                    <% end_loop %>
                </ul><!-- /.nav navbar-nav -->
                <% if $SearchForm %>
                    <a data-toggle="modal" href="#searchModal" class="btn btn-default navbar-btn pull-right"><i class="fa fa-search"></i></a>
                <% end_if %>
            </div><!-- /.collapse navbar-collapse -->
            <div id="select-navigation" class="collapse navbar-collapse visible-xs">
                <div class="menu-icon btn-primary btn-shadow"><i class="fa fa-align-justify"></i></div><!-- /.menu-icon -->
                <% if $SearchForm %>
                    <a data-toggle="modal" href="#searchModal" class="btn-default navbar-btn menu-icon search"><i class="fa fa-search"></i></a>
                <% end_if %>
                <select class="input-sm" onchange="document.location.href=this.options[this.selectedIndex].value;">
                    <% if LinkOrCurrent = current %>
                        <option selected value="$BaseHref"><% _t('Navigation.HomeLabel', 'Home') %></option>
                    <% else %>
                        <option value="$BaseHref"><% _t('Navigation.HomeLabel', 'Home') %></option>
                    <% end_if %>
                    <% loop $Menu(1) %>
                        <% if Children %>
                            <% if LinkOrCurrent = current %>
                                <option selected value="$Link">$MenuTitle</option>
                            <% else %>
                                <option value="$Link">$MenuTitle</option>
                            <% end_if %>
                            <% loop Children %>
                                <% if LinkOrCurrent = current %>
                                    <option selected value="$Link">- $MenuTitle</option>
                                <% else %>
                                    <option value="$Link">- $MenuTitle</option>
                                <% end_if %>
                            <% end_loop %>
                        <% else %>
                            <% if LinkOrCurrent = current %>
                                <option selected value="$Link">$MenuTitle</option>
                            <% else %>
                                <option value="$Link">$MenuTitle</option>
                            <% end_if %>
                        <% end_if %>
                    <% end_loop %>
                </select><!-- /.input-sm -->
                <div class="clearfix"></div><!-- /.clearfix -->
            </div><!-- /.select-navigation -->
        </nav><!-- /#main-nav .navbar navbar-default -->
    </div><!-- /.col-xs-2 col-sm-10 -->
</div><!-- /.row -->

<% if $SearchForm %>
    $SearchForm
<% end_if %>