# sso.rho.social

This sub-application(branch) is used for "Single-Sign On" for all application 
except backend.

If any operations of every application is login required, it will redirect browser 
to this application, then it will go back if authentication succeeded.

If a member lost his password or credential, this application provides a way to 
reset password. May be it need mailing component.

If someone is not member of this website yet, the registration link shows at the 
bottom.

## Configuration

This application will share common identity, it depends on common cookie domain  
and session domain. But the `cookieValidationKey` of each application must be 
different. That's will result in seperate CSRF tokens among all applications, and
you should implement `logout` feature by yourself for every application.
