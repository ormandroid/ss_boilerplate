<aside class="sharer">
    <a data-toggle="collapse" data-parent="#accordion" href="#sharer" class="btn btn-secondary">Share this post <i class="fa fa-share-square-o"></i></a>
    <div id="sharer" class="collapse">
        <div class="inner">
            <input type="text" onclick="this.setSelectionRange(0, this.value.length)" class="share-link" value="{$AbsoluteLink}" />
            <ul class="list-inline list-unstyled">
                <li class="first">
                    <a href="mailto:?subject=$Title&body=$AbsoluteLink" title="<%t Sharer.Email "Send to a friend" %>">
                        <i class="fa fa-envelope"></i>
                    </a>
                </li><!-- /.first -->
                <li>
                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=$AbsoluteLink&amp;title=$Title" title="<%t Sharer.Facebook "Share to Facebook" %>">
                        <i class="fa fa-facebook"></i>
                    </a>
                </li>
                <li>
                    <a target="_blank" href="http://twitter.com/home?status=$Title - +$AbsoluteLink" title="<%t Sharer.Twitter "Share to Twitter" %>">
                        <i class="fa fa-twitter"></i>
                    </a>
                </li>
                <li class="last">
                    <a target="_blank" href="https://plus.google.com/share?url=$AbsoluteLink" title="<%t Sharer.Google "Share to Google Plus" %>">
                        <i class="fa fa-google-plus"></i>
                    </a>
                </li><!-- /.last -->
            </ul><!-- /.list-inline list-unstyled -->
        </div><!-- /.inner -->
    </div><!-- /#sharer -->
</aside><!-- /.sharer -->