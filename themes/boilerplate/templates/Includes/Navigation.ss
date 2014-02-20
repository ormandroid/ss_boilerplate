<nav id="main-nav" class="navbar navbar-default" role="navigation">

    <div class="navbar-collapse hidden-sm hidden-xs">
        <ul class="nav navbar-nav pull-right">
            <% loop $Menu(1) %>
                <% if $Children %>
                    <li class="$LinkingMode dropdown">
                        <a href="$Link" title="$Title.XML">$MenuTitle.XML <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <% loop $Children %>
                                <li class="$LinkingMode"><a href="$Link" title="$Title.XML">$MenuTitle.XML</a></li>
                            <% end_loop %>
                        </ul><!-- /.dropdown-menu -->
                    </li><!-- /.dropdown -->
                <% else %>
                    <li class="$LinkingMode"><a href="$Link" title="$Title.XML">$MenuTitle.XML</a></li>
                <% end_if %>
            <% end_loop %>
            <% if $SearchForm %>
                <li><a data-toggle="modal" href="#searchModal" class="btn btn-secondary"><i class="fa fa-search"></i></a></li>
            <% end_if %>
        </ul><!-- /.nav navbar-nav pull-right -->
    </div><!-- /.collapse navbar-collapse -->

    <div class="navbar-collapse visible-sm">
        <ul class="nav navbar-nav pull-right">
            <% loop $Menu(1) %>
                <% if $Children %>
                    <li class="$LinkingMode dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">$MenuTitle.XML <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li class="$LinkingMode"><a href="$Link" title="$Title.XML">$MenuTitle.XML</a></li>
                            <li class="divider"></li>
                            <% loop $Children %>
                                <li class="$LinkingMode"><a href="$Link" title="$Title.XML">$MenuTitle.XML</a></li>
                            <% end_loop %>
                        </ul><!-- /.dropdown-menu -->
                    </li><!-- /.dropdown -->
                <% else %>
                    <li class="$LinkingMode"><a href="$Link" title="$Title.XML">$MenuTitle.XML</a></li>
                <% end_if %>
            <% end_loop %>
            <% if $SearchForm %>
                <li><a data-toggle="modal" href="#searchModal" class="btn btn-secondary"><i class="fa fa-search"></i></a></li>
            <% end_if %>
        </ul><!-- /.nav navbar-nav pull-right -->
    </div><!-- /.collapse navbar-collapse -->

    <div id="select-navigation" class="visible-xs">
        <div class="menu-icon btn-primary"><i class="fa fa-align-justify"></i></div><!-- /.menu-icon -->
        <% if $SearchForm %>
            <a data-toggle="modal" href="#searchModal" class="btn-secondary navbar-btn menu-icon search"><i class="fa fa-search"></i></a>
        <% end_if %>
        <select class="input-sm" onchange="document.location.href=this.options[this.selectedIndex].value;">
            <% loop $Menu(1) %>
                <% if $Children %>
                    <% if $LinkOrCurrent = current %>
                        <option selected value="$Link">$MenuTitle</option>
                    <% else %>
                        <option value="$Link">$MenuTitle</option>
                    <% end_if %>
                    <% loop $Children %>
                        <% if $LinkOrCurrent = current %>
                            <option selected value="$Link">- $MenuTitle</option>
                        <% else %>
                            <option value="$Link">- $MenuTitle</option>
                        <% end_if %>
                    <% end_loop %>
                <% else %>
                    <% if $LinkOrCurrent = current %>
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