# MongoDB Configuration

## Default

- username: `rho_user`
- password: `123456`
- host: `localhost`
- port: `27017`
- database: `rho`

We will not add user if `rho_user` didn't exist, or not change password if it's password was not `123456`.
If you want to modify anyone of the above default values, please add config value file by yourself:

- username: `username.php`
- password: `password.php`
- host: `host.php`
- port: `port.php`
- database: `database.php`

Each of above files should be laid in `config/mongodb` directory.