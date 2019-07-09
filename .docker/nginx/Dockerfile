FROM nginx:stable-alpine

WORKDIR /app

RUN mkdir -p public/storage \
    && ln -s /app/storage/app/public /app/public/storage/files