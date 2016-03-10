## Configuration

### Create Project

Run the following command to create new project:
```
composer create-project --stability <stability> rhosocial/rho.social <path>
```

Now we don't publish any release versions, please use `dev` as stability parameter.

We strongly recommend you run `create-project` command to pull the code package 
and install dependency packages, then it will run `setPermission` command for 
runtime and assets directory and `generateCookieValidationKey` command for each 
of applications. You can run `git pull` command to pull the update code manually.

### Install dependencies

Run the following command to install dependencies:
```
composer install
```

### Update dependencies

Run the following command to update dependencies:
```
composer update
```

Note:
- The above operations may need root permission.
- Most of the packages are hosted on GitHub, and the installation process will 
frequently access the APIs, so you may need to generate an access token in your 
own [GitHub account setting](https://github.com/settings/tokens) (login required).
- This process may cosume ten minutes at least, depending on your network speed.

### [Development environment](CONFIG_DEV_ENV.md)

### [Production environment](CONFIG_PROD_ENV.md)

### [Apache 2](CONFIG_APACHE.md)

### [PHP](CONFIG_PHP.md)

### [MySQL](CONFIG_MySQL.md)

### [MongoDB](CONFIG_MongoDB.md)

### [Redis](CONFIG_Redis.md)
