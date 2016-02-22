## Configuration

### Install dependencies

Run the following command to install dependencies:
~~~
composer install
~~~
Note:
- May be you need root permission.
- Most of the packages are hosted on GitHub, and the installation process will frequently access the APIs, so you may need to generate an access token in your own GitHub account setting.
- This process may cosume ten minutes at least, depending on your network speed.

### Development environment.

If you want to develop this application, you need to add the following files by yourself:

Note: The default config will be taken if file specified by `OPTIONAL` doesn't exist.

- base domain

`/common/config/base/baseDomain-local.php` This file specifies the base domain of this application.

- mysql

`/common/config/db/mysql/username.php` username of mysql. OPTIONAL, Defaults to `root`.
`/common/config/db/mysql/password.php` password of mysql. OPTIONAL, Defaults to empty string.
`/common/config/db/mysql/host.php` host of mysql. OPTIONAL, Defaults to `localhost`.
`/common/config/db/mysql/dbname.php` database name of this application in mysql. OPTIONAL, Defaults to `rho.social`.
`/common/config/db/mysql/tablePrefix.php` table prefix of this application in mysql. OPTIONAL, Defaults to empty string.
`/common/config/db/mysql/charset.php` character set of this application in mysql. OPTIONAL, Defaults to `utf8mb4`.

- mongodb

`/common/config/mongodb/username.php` username of mongodb.
`/common/config/mongodb/password.php` password of mongodb.
`/common/config/mongodb/host.php` host of mongodb. OPTIONAL, Defaults to `localhost`.
`/common/config/mongodb/port.php` port of mongodb. OPTIONAL, Defaults to 27017.
`/common/config/mongodb/database.php` database name of mongodb.

- request component

`/common/config/request/cookieValidationKey.php` Random string of 32 chars.
`/common/config/request/cookieValidationKey-local.php` Random string of 32 chars for local.

- redis component

`/common/config/redis/redis-local.php` Redis configurations for local.
`/common/config/redis/redis.hostname.php` hostname of redis. OPTIONAL, Defaults to `localhost`.
`/common/config/redis/redis.hostname-local.php` hostname or redis for local. OPTIONAL, Defaults to `localhost`. Required by `redis-local.php`.
`/common/config/redis/redis.port.php` port of redis. OPTIONAL, Defaults to 6379.
`/common/config/redis/redis.database.php` database of redis. OPTIONAL, Defaults to 0.
`/common/config/redis/redis.password.php` password of redis. OPTIONAL, Defaults to empty string.
`/common/config/redis/name.php` session name stored in redis. OPTIONAL, Defaults to `rho_local_sess_`.
`/common/config/redis/keyPrefix.php` session key prefix stored in redis. OPTIONAL, Defaults to `RHO_LOCAL_SESSID_`.

- each of sub-application

`/<sub-app name>/config/main-local.php` Local configurations. OPTIONAL, Defaults to empty array. If you want to load `debug`, `gii` or any other components, please add this file and modify `$config['components']` configs.

### Production environment.

You need to modify the following files:

TO BE SUPPLEMENTED.
