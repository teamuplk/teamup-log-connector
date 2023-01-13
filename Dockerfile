FROM existenz/webstack:8.0

RUN apk add --no-cache composer

ARG BUILD_ENV

WORKDIR /

COPY ./ /www