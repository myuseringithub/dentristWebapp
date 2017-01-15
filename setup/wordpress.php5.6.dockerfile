# Forked from https://github.com/docker-library/wordpress/blob/master/php5.6/apache/Dockerfile
FROM php:5.6-apache

# PHP Extensions - install the PHP extensions we need
RUN set -ex; \
	\
	apt-get update; \
	apt-get install -y \
		libjpeg-dev \
		libpng12-dev \
	; \
	rm -rf /var/lib/apt/lists/*; \
	\
	docker-php-ext-configure gd --with-png-dir=/usr --with-jpeg-dir=/usr; \
	docker-php-ext-install gd mysqli opcache
# TODO consider removing the *-dev deps and only keeping the necessary lib* packages

# PHP.ini - set recommended PHP.ini settings
# see https://secure.php.net/manual/en/opcache.installation.php
RUN { \
		echo 'opcache.memory_consumption=128'; \
		echo 'opcache.interned_strings_buffer=8'; \
		echo 'opcache.max_accelerated_files=4000'; \
		echo 'opcache.revalidate_freq=2'; \
		echo 'opcache.fast_shutdown=1'; \
		echo 'opcache.enable_cli=1'; \
	} > /usr/local/etc/php/conf.d/opcache-recommended.ini

# Apache
# RUN apt-get install libapache2-mod-macro;
# Apache mods to enable: Reverse proxy, macro, ssl, vhost_alias
RUN a2enmod rewrite expires xml2enc proxy proxy_ajp proxy_http deflate headers proxy_balancer proxy_connect proxy_html macro ssl vhost_alias headers;

# Environment Variables
# https://wordpress.org/download/release-archive/
ENV WORDPRESS_VERSION 4.6.1
# SHA1 Checksum computed on the downloaded file, as a way to verify the content authenticity.
ENV WORDPRESS_SHA1 027e065d30a64720624a7404a1820e6c6fff1202

# Wordpress download:
RUN set -ex; \
	curl -o wordpress.tar.gz -fSL "https://wordpress.org/wordpress-${WORDPRESS_VERSION}.tar.gz"; \
	echo "$WORDPRESS_SHA1 *wordpress.tar.gz" | sha1sum -c -; \
	# upstream tarballs include ./wordpress/ so this gives us /usr/src/wordpress
	tar -xzf wordpress.tar.gz -C /usr/src/; \
	rm wordpress.tar.gz; \
	chown -R www-data:www-data /usr/src/wordpress

# update and install essentials:
RUN apt-get -y update && apt-get -y upgrade && apt-get -y install vim; apt-get -y install nano; pecl install zip;

# Volumes:
VOLUME /app/
VOLUME /etc/apache2/sites-available/

# Apache enable sites configuration and remove default.
RUN rm -r /etc/apache2/sites-enabled/*;

# Copy content to container:
# COPY ./content/ /tmp/content/
# COPY ./distribution/ /tmp/distribution/

# Apparently when copied from windows, execution permissions should be granted.
COPY ./setup/shellScript/wordpressContainerEntrypoint.duringRuntime.sh /usr/local/bin/
COPY ./setup/shellScript/addContentAndConfigs.duringRuntime.sh /usr/local/bin/ 
RUN chmod +x /usr/local/bin/wordpressContainerEntrypoint.duringRuntime.sh
RUN chmod +x /usr/local/bin/addContentAndConfigs.duringRuntime.sh
# RUN find /usr/local/bin/ -type f -exec chmod +x {} \;

# RUN echo 'ServerName localhost' >> /etc/apache2/conf-available/000-default.conf

ENTRYPOINT ["wordpressContainerEntrypoint.duringRuntime.sh"]
CMD ["apache2-foreground"]
