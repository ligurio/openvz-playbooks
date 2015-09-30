<Directory /var/www/criu-wiki>
        Options FollowSymLinks

	RewriteEngine On
	RewriteCond %{REQUEST_FILENAME} !-f
	RewriteCond %{REQUEST_FILENAME} !-d
	RewriteRule ^(.+)$ /index.php/$1 [L,QSA]

        # Enable gzip compression
        SetOutputFilter DEFLATE

        # Don't compress images
        SetEnvIfNoCase Request_URI \
        \.(?:gif|jpe?g|png)$ no-gzip dont-vary

        # Make sure proxies don't deliver the wrong content
        Header append Vary User-Agent env=!dont-vary

        ExpiresActive On
        ExpiresDefault "access plus 1 day"

</Directory>
