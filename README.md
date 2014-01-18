# Don't Log Crawlers

This plugin, originally forked from [Dont Log Bots](https://github.com/YOURLS/YOURLS/wiki/Plugin-%3D-Dont-Log-Bots), prevents YOURLS from counting visits of crawlers and bots with specific User Agent strings.

Because there are so many crawlers and bots out there, only ones confirmed active since December 2013 are included, according to the comprehensive list available at [user-agent-string.info](http://user-agent-string.info/list-of-ua/bots).

## Installation

1. Make a new directory in ``user/plugins``
2. Upload ``plugin.php`` there
3. Go to the Plugins administration page ( eg http://sho.rt/admin/plugins ) and activate the plugin.

Done!

## Twitter

Also, following UA strings, which obviously belong to visits from Twitter, are included:

* ``ning/1.0``
* ``yahoo:linkexpander:slingstone``
* ``google-http-java-client/1.17.0-rc (gzip)``
* ``js-kit url resolver``
* ``htmlparser``
* ``paperlibot``

## Others?

If you noticed UA strings which should be included are missed or should be excluded are included, please submit an issue or send a PR request!

You would try this query to get a list of visits per UA strings:
````
SELECT DISTINCT `user_agent` as ua, COUNT(*) as c FROM `yourls_log` GROUP BY ua ORDER BY c DESC
````

## License

The code is available under [MIT licence](http://revolunet.mit-license.org/).


[![githalytics.com alpha](https://cruel-carlota.pagodabox.com/70757afe48c17be20fb1ecd375d98897 "githalytics.com")](http://githalytics.com/luixxiul/dont-log-crawlers)
