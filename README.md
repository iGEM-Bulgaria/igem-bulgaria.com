
<h1 align="center">The <a href="http://igem-bulgaria.com">iGEM-Bulgaria</a> website</h2>
<p align="center">
  <a href="http://igem-bulgaria.com" align="center"><img src="http://igem-bulgaria.com/assets/images/logo_small.png"/></a>
</p>

# Development requirements and setup:

1. PHP `>= 5.2` with the `SPL` extension installed
2. Apache / Ngninx configured similar to:

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

3. Hostfile (`/etc/hosts`) entry similar to
    ```
    127.0.0.1   igem-bulgaria.dev
    ```

4. [Composer](https://getcomposer.org/)

    ```
    $ composer install
    ```

5. Write permissions to the `lang/langcache` folder

    ```
    $ chmod -R 775 lang/langcache
    ```

6. (Optional) Clone `deploy-config.example.php` into `deploy-config.php` and edit accordingly, depending on the server you want to deploy on. Upload `deploy-config.php` manually to the server.

# Credits

- [**Kite HTML5 theme** by Jewel Theme](https://jeweltheme.com/product/kite/)
- [**jquery-circle-progress** by kottenator](https://github.com/kottenator/jquery-circle-progress)
- [**jquery-flipster** by drien](https://github.com/drien/jquery-flipster)
- [**php-i18n** by Philipp15b](https://github.com/Philipp15b/php-i18n)
- [**simple-php-git-deploy** by markomarkovic](https://github.com/markomarkovic/simple-php-git-deploy)
