FROM jorge07/alpine-php:8.1-dev
RUN apk add bash
EXPOSE 80

WORKDIR /app

COPY ./flag.txt /
COPY ./index.php /app

CMD ["php", "-S", "0.0.0.0:80"]