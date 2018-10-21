FROM php:5.6

RUN apt-get update && apt-get install -y --no-install-recommends \
      libfreetype6-dev \
      libjpeg62-turbo-dev \
      libmcrypt-dev \
      libpng-dev \
      unzip \
      vim \
 && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/

RUN docker-php-ext-install -j$(nproc) iconv mcrypt mysqli \
 && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
 && docker-php-ext-install -j$(nproc) gd

ENV PHPBB_VERSION 3.1.12
ENV PHPBB_SHA256 88742695f5c20e83ea2547ee070eed2e6c3b1140e407a0569bbbff2f2a630367

WORKDIR /app

RUN curl -o phpbb.tar.gz -fSL https://github.com/phpbb/phpbb/archive/release-$PHPBB_VERSION.tar.gz \
 && echo "$PHPBB_SHA256 *phpbb.tar.gz" | sha256sum -c - \
 && tar --strip-components=1 -xzf phpbb.tar.gz && rm phpbb.tar.gz

WORKDIR /app/phpBB

RUN php ../composer.phar install

EXPOSE 80
CMD ["php", "-S", "0.0.0.0:80", "-t", "/app/phpBB"]
