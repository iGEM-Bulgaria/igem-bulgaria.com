<p align="center">
    # The [iGEM-Bulgaria](http://igem-bulgaria.com) website
    <img src="http://igem-bulgaria.com/assets/images/logo_small.png"/>
</p>

# Development requirements

- PHP `>= 5.2` with the `SPL` extension installed
- Apache / Ngninx configured similar to:

    ```
    <VirtualHost *:80>
        ServerName igem-bulgaria.dev
        ServerAlias www.igem-bulgaria.dev

        ServerAdmin webmaster@localhost
        DocumentRoot /PATH_TO_ROOT/igem-bulgaria/public
        <Directory /PATH_TO_ROOT/igem-bulgaria/public>
            Options FollowSymLinks
            AllowOverride All
        </Directory>
        ErrorLog ${APACHE_LOG_DIR}/igem-bulgaria/error.log
        CustomLog ${APACHE_LOG_DIR}/igem-bulgaria/access.log combined
    </VirtualHost>
    ```
(Note that the document root is in the `/public` subfolder rather than the repo's root)

# Credits

- [Kite hTML5 theme by Jewel Theme](https://jeweltheme.com/product/kite/)
- [jquery-circle-progress by kottenator](https://github.com/kottenator/jquery-circle-progress)
- [php-i18n by Philipp15b](https://github.com/Philipp15b/php-i18n)