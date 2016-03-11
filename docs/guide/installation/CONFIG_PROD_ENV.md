# Production Environment

You need to modify the following files:

#### request component

`common/config/request.php` Random string of 32 chars at least.

We provide a command for generating random string.

```
rhosocial_test init/config/cookie-validation-key <app name>
```

For example:

```
rhosocial_test init/config/cookie-validation-key common
```

It will generate a random string and put it into `common/config/request.php` if `cookieValidationKey` parameter is empty.

#### Entry script

Each entry script of applications defined the development environment, You should modify it to `prod` manually.
