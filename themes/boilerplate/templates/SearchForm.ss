<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form $FormAttributes role="form">
                <fieldset>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="icon-search"></i> <% sprintf(_t('SearchForm.SearchHeading',"Search %s"), $SiteConfig.Title) %></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" name="Search" placeholder="<% _t('SearchForm.SearchPlaceholder', 'Enter your search keywords...') %>" class="form-control" id="SearchForm_SearchForm_Search">
                        </div><!-- /.form-group -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><% _t('SearchForm.CloseButton', 'Close') %></button>
                        <input type="submit" name="action_results" value="Search" class="action btn btn-primary" id="SearchForm_SearchForm_action_results">
                    </div>
                </fieldset>
            </form><!-- /[role="form"] -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->