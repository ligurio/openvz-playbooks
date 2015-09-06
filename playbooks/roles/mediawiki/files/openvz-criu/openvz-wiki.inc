# Mailing list manager and archives redirects

	# For mailman, always redirect to https

	RewriteRule ^/mailman[/]$ \
		https://lists.openvz.org/mailman/listinfo [R=301,L]
	RewriteRule ^/mailman/(.*)$ \
		https://lists.openvz.org/mailman/$1 [R=301,L]

	# For pipermail, redirect to either http or https
	# based on current proto, thus two rules

	RewriteCond %{HTTPS} !=on
	RewriteRule ^/pipermail/(.*)$ \
		http://lists.openvz.org/pipermail/$1 [R=301,L]

	RewriteRule ^/pipermail/(.*)$ \
		https://lists.openvz.org/pipermail/$1 [R=301,L]


<Directory /var/www/openvz-wiki>
	Options FollowSymLinks

	RewriteEngine on

#### MAIN REDIRECT HERE ####
	RewriteCond %{REQUEST_FILENAME} !-f
	RewriteCond %{REQUEST_FILENAME} !-d
	RewriteRule ^(.+)$ /index.php?title=$1 [L,QSA]


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
