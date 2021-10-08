FROM ubuntu:18.04
LABEL author="Pei-Ying Liu"
LABEL email ="peiying.liu@uqconnect.edu.au"

ENV TZ Australia/Brisbane
ENV PHPVER=7.4

RUN apt-get update \
    && pecl install igbinary \
	&& pecl install redis \
	&& docker-php-ext-install mysqli \
	&& docker-php-ext-enable redis \
	&& echo "extension=redis.so" > /usr/local/etc/php/conf.d/redis.ini
    && ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone \
    && apt-get install --no-install-recommends --no-install-suggests -q -y software-properties-common \
    && apt-get update \
    && add-apt-repository ppa:ondrej/php \
    && apt-get update \
    && apt-get install --no-install-recommends --no-install-suggests -q -y \
    nginx \
    php${PHPVER}-fpm \
    && apt-get clean \
    && apt-get autoremove \
    && rm -rf /var/lib/apt/lists/*

ADD src/nginx.ini /etc/nginx/sites-available/default
COPY $PWD/src/index.html /var/www/html/index.html

EXPOSE 80
VOLUME /var/www/html
WORKDIR /var/www/html
ENTRYPOINT ["/bin/bash", "-c", "/usr/sbin/service php${PHPVER}-fpm start && nginx -g 'daemon off;'"]
