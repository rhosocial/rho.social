# Redis Configuration

## Default

- hostname: `localhost`
- password: null
- port: `6379`
- database: `0`

We will not change password if it's password was not null.
If you want to modify anyone of the above default values, please add config value file by yourself:

- password: `password.php`
- hostname: `hostname.php`
- port: `port.php`
- database: `database.php`

Each of above files should be laid in `config/redis` directory.