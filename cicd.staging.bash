#!/bin/zsh


# exit when any command fails
set -e
# keep track of the last executed command
trap 'last_command=$current_command; current_command=$BASH_COMMAND' DEBUG
# echo an error message before exiting
trap 'echo "\"${last_command}\" --> EXIT CODE $?."' EXIT


##############################################
# legge le variabili del file .env
# set -a            
# source .env
# set +a
##############################################

IMAGE_WEB=cr.dag.lan/dagblog-web
IMAGE_PHP=cr.dag.lan/dagblog-php
DOCKER_HOST=docker1

# build web
# docker build . -t $IMAGE_WEB -f Dockerfile.prod-web
# docker tag $IMAGE_WEB $IMAGE_WEB:latest
# docker push -a $IMAGE_WEB
docker buildx build . --file Dockerfile.prod-web --tag $IMAGE_WEB --platform linux/amd64 --push --no-cache

#  build php
# docker build . -t $IMAGE_PHP -f Dockerfile.stage-php
# docker tag $IMAGE_PHP $IMAGE_PHP:latest
# docker push -a $IMAGE_PHP
docker buildx build . --file Dockerfile.stage-php --tag $IMAGE_PHP --platform linux/amd64 --push --no-cache

# copia i file per l'esecuzione del docker compose
rsync -auvh --progress -e ssh ./docker-compose.stage.yaml $DOCKER_HOST:/docker/dagblog/docker-compose.yaml
rsync -auvh --progress -e ssh ./assets $DOCKER_HOST:/docker/dagblog/
# scp ./docker-compose.stage.yaml root@$DOCKER_HOST:/docker/dagblog/docker-compose.yaml
# scp ./.env root@$DOCKER_HOST:/docker/dagblog/.env

# aggiorna i posts da git
ssh root@$DOCKER_HOST "mkdir -p /docker/dagblog/assets/blog"
rsync -auvh --progress -e ssh /Volumes/DagStorage/dagtech/posts $DOCKER_HOST:/docker/dagblog/assets/blog/

# esegue doker compose
ssh  root@$DOCKER_HOST "docker pull $IMAGE_WEB:latest && docker pull $IMAGE_PHP:latest"
ssh  root@$DOCKER_HOST "docker pull $IMAGE_WEB:latest && docker pull $IMAGE_PHP:latest"
ssh  root@$DOCKER_HOST "cd /docker/dagblog && docker compose up -d --force-recreate --pull always"
# ssh  root@$DOCKER_HOST "docker image prune -f"
