#!/bin/bash

docker-compose run --rm --entrypoint "/scripts/dump_data.sh" app && \
docker-compose run --rm --entrypoint "composer install" app && \
docker-compose run --rm --entrypoint "npm install" client && \
docker-compose up -d
