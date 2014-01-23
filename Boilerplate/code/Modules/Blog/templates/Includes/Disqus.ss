<% if $SiteConfig.DisqusForumShortName %>
    <section id="disqusComments">
        <h2>Join the conversation</h2>
        <div id="disqus_thread"></div>
        <script type="text/javascript">
            var disqus_shortname = '{$SiteConfig.DisqusForumShortName}'; // required: replace example with your forum shortname
            (function() {
                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
            })();
        </script>
    </section><!-- /#disqusComments -->
<% end_if %>