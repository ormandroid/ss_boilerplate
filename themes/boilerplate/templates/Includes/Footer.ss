<footer id="footer" role="contentinfo">
    <section class="container">
        <p>
            $SiteConfig.Title | &copy; Copyright $Now.Year |
            <% if $CurrentMember %>
                <% loop $CurrentMember %>
                    <a href="Security/logout">Logout</a>
                <% end_loop %>
            <% else %>
                <a href="Security/login">Login</a>
            <% end_if %>
        </p>
    </section><!-- /.container -->
</footer><!-- /.footer -->