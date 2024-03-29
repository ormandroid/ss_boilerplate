# SS Boilerplate #

A rapid development theme based on Bootstrap 3.1.x

###[DEMO](http://webdough.co.nz/~boilerpl/)###

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
* Mailchimp Newsletter
* Google Fonts API

## Installation ##

Install [Silverstripe](http://www.silverstripe.org/stable-download/).

Download [Sortable Grid Field](https://github.com/UndefinedOffset/SortableGridField) and place it in the root of your application.

Copy across all of the files to your root directory.

Set Boilerplate as your site's theme either in the admin area of your site: Settings > theme, or adding the following code to your mysite/_config/config.yml file:

```
SSViewer:
  theme: 'boilerplate'
```

Run `dev/build` and `?flush=all` in your url i.e http://mydomain.com/dev/build and http://mydomain.com?flush=all

#### Composer ####

```
composer require ryanpotter/ss_boilerplate
```

### CMS theme ###

If you would like to activate the CMS theme, go to Boilerplate/_config/config.yml and uncomment the extension then run a `?flush=all`

### Grunt ###

If you have [grunt installed](http://gruntjs.com/getting-started) you can run one of two tasks to edit and compress your CSS.

By default running `grunt` in the root of your application will watch the themes/boilerplate/sass folder and create both a production, and a development version of all the css in the theme.

If you're using the CMS theme and would like to edit the colours etc then you can run the watch task `grunt watch:cms` which will again create both a production, and a development version of all the css in the CMS theme.

## Thanks to ##

http://p.yusukekamiyamane.com/ for the icons
