# SS Boilerplate #

A rapid development theme based on Bootstrap 3.x

## Features ##

* [Sass Bootstrap](https://github.com/thomas-mcdonald/bootstrap-sass)
* [Font Awesome](http://fontawesome.io/)
* [Sortable GridFields](https://github.com/UndefinedOffset/SortableGridField)
* Blog
* Portfolio
* Files
* User Registration
* Disqus Comments
* Contact Form

## Installation ##

####Requires: [Sortable Grid Field](https://github.com/UndefinedOffset/SortableGridField)####

Install [Silverstripe](http://www.silverstripe.org/stable-download/).

Copy across all of the files to your root directory.

Set Boilerplate as your site's theme either in the admin area of your site: Settings > theme, or adding the following code to your mysite/_config/config.yml file:

```
SSViewer:
  theme: 'boilerplate'
```

Run `dev/build` and `?flush=all` in your url i.e http://mydomain.com/dev/build and http://mydomain.com?flush=all

### CMS theme ###

If you would lik to activate the CMS theme, go to mysite/Boilerplate/_config/config.yml and uncomment the extension then run a `?flush=all`

### Grunt ###

If you have [grunt installed](http://gruntjs.com/getting-started) you can run one of two tasks to edit and compress your CSS.

By default running `grunt` in the root of your application will watch the themes/boilerplate/sass folder and create both a production, and a development version of all the css in the theme.

If you're using the CMS theme and would like to edit the colours etc then you can run the watch task `grunt watch:cms` which will again create both a production, and a development version of all the css in the CMS theme.

## Thanks to ##

http://p.yusukekamiyamane.com/ for the icons
