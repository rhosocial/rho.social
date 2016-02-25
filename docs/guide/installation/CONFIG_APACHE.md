# Apache 2 Configuration

## Modules

- core_module (static)
- win32_module (static, windows only)
- mpm_winnt_module (static, windows only)
- http_module (static)
- so_module (static)
- actions_module (shared)
- alias_module (shared)
- allowmethods_module (shared)
- asis_module (shared)
- auth_basic_module (shared)
- authn_core_module (shared)
- authn_file_module (shared)
- authz_groupfile_module (shared)
- authz_host_module (shared)
- authz_user_module (shared)
- autoindex_module (shared)
- cgi_module (shared)
- dir_module (shared)
- env_module (shared)
- include_module (shared)
- info_module (shared)
- isapi_module (shared)
 -log_config_module (shared)
- mime_module (shared)
- negotiation_module (shared)
- php5_module (shared)
- rewrite_module (shared)
- setenvif_module (shared)
- socache_shmcb_module (shared)
- status_module (shared)

## Virtual Hosts

You should enable the following virtual hosts:

- admin.rho.social
- api.rho.social
- express.rho.social
- my.rho.social
- reg.rho.social
- rho.social
- sso.rho.social