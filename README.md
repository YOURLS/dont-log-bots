Don't Log Bots
==============

Plugin for [YOURLS](http://yourls.org) 1.5.1+. 

Description
-----------
Ignore bot hits in your stats (both click count as seen in the main admin page and in detailed stats).

Installation
------------
1. In `/user/plugins`, create a new folder named `dont-log-bots`.
2. Drop these files in that directory.
3. Go to the Plugins administration page ( *eg* `http://sho.rt/admin/plugins` ) and activate the plugin.
4. Have fun!

More
----
The list of bot user agent strings has been compiled from one of my own YOURLS setup: user-agents **looking like** bots with more than 100 hits. There is no reliable way to determine if a client is a bot or not.  
To check user agents on your own setup, you can try this query:

```mysql
SELECT DISTINCT `user_agent` as ua, COUNT(*) as c FROM `yourls_log` GROUP BY ua ORDER BY c DESC
```
