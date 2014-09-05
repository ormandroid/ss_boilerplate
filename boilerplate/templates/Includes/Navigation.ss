<nav id="main-nav" class="navbar navbar-default" role="navigation">
    <ul class="nav navbar-nav pull-right hidden-xs">
        <% loop $Menu(1) %>
            <% if $Children %>
                <li class="$LinkingMode dropdown $EvenOdd $FirstLast">
                    <a href="$Link" title="$Title" class="visible-lg">$MenuTitle.XML <i class="fa fa-caret-down"></i></a>
                    <a href="#" class="dropdown-toggle hidden-lg" data-toggle="dropdown">$MenuTitle.XML <i class="fa fa-caret-down"></i></a>
                    <ul class="dropdown-menu">
                        <% loop $Children %>
                            <li class="$LinkingMode $EvenOdd $FirstLast"><a href="$Link" title="$Title">$MenuTitle.XML</a></li>
                        <% end_loop %>
                    </ul><!-- /.dropdown-menu -->
                </li><!-- /.dropdown -->
            <% else %>
                <li class="$LinkingMode $EvenOdd $FirstLast"><a href="$Link" title="$Title">$MenuTitle.XML</a></li>
            <% end_if %>
        <% end_loop %>
        <% if $SearchForm %>
            <li><a href="{$Link}SearchForm?Search" class="btn btn-link"><i class="fa fa-search"></i></a></li>
        <% end_if %>
    </ul><!-- /.nav navbar-nav pull-right hidden-xs -->
    <div id="select-navigation" class="visible-xs">
        <div class="menu-icon btn-primary"><i class="fa fa-align-justify"></i></div><!-- /.menu-icon -->
        <% if $SearchForm %>
            <a href="{$Link}SearchForm?Search" class="btn-secondary navbar-btn menu-icon search"><i class="fa fa-search"></i></a>
        <% end_if %>
        <select class="input-sm" onchange="document.location.href=this.options[this.selectedIndex].value;">
            <% loop $Menu(1) %>
                <% if $Children %>
                    <option value="$Link">$MenuTitle.XML</option>
                    <% loop $Children %>
                        <% if $LinkOrCurrent = current %>
                            <option selected value="$Link">- $MenuTitle.XML</option>
                        <% else %>
                            <option value="$Link">- $MenuTitle.XML</option>
                        <% end_if %>
                    <% end_loop %>
                <% else %>
                    <% if $LinkOrCurrent = current %>
                        <option selected value="$Link">$MenuTitle.XML</option>
                    <% else %>
                        <option value="$Link">$MenuTitle.XML</option>
                    <% end_if %>
                <% end_if %>
            <% end_loop %>
        </select><!-- /.input-sm -->
        <div class="clearfix"></div><!-- /.clearfix -->
    </div><!-- /.select-navigation -->
</nav><!-- /#main-nav .navbar navbar-default -->