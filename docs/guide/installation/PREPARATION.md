## Preparation

The following software and tools should be installed firstly:

#### REQUIRED:

- [Apache](http://httpd.apache.org) 2.4.18 [for Windows](http://httpd.apache.org/docs/current/platform/windows.html#down)

- [PHP](http://php.net/downloads.php) 5.6.19 [for Windows](http://windows.php.net/download)

- [MySQL](http://dev.mysql.com/downloads/) 5.7.11

- [MongoDB](https://www.mongodb.org/downloads) 3.3.2 [for Windows](https://www.mongodb.org/dl/win32/x86_64-2008plus)

- [Redis](http://redis.io/download) 3.0.501 [for Windows](https://github.com/MSOpenTech/redis/releases)

- [Composer](https://getcomposer.org/download)

The composer packages manager requires composer asset plugin. Run the following command to install it:
~~~
composer global require fxp/composer-asset-plugin:*
~~~

This application does NOT support PHP 7, because the required yii2 extension yii2-mongodb does not support it. If yiisoft/yii2-mongodb supports PHP 7, we will migrate this project to PHP 7.

If you are one of collaborators, you should prepare [GitHub Desktop](https://desktop.github.com) or [Git Shell](http://git-scm.com/).

If you do not know how to use GitHub, please visit [tutorials](http://try.github.com/) website.

#### OPTIONAL:

- [phpMyAdmin](http://www.phpmyadmin.net)

- [rockmongo](http://rockmongo.com/)
