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
PROJECT_PATH=/docker/dagblog

# docker build . -t $IMAGE_WEB -f Dockerfile.prod-web
# docker tag $IMAGE_WEB $IMAGE_WEB:latest
# docker push -a $IMAGE_WEB

# build web
docker buildx build . --file Dockerfile.prod-web --tag $IMAGE_WEB --platform linux/amd64 --push --no-cache
# build php
docker buildx build . --file Dockerfile.stage-php --tag $IMAGE_PHP --platform linux/amd64 --push --no-cache

# crea la cartella di destinazione del progetto (se non esiste)
ssh root@$DOCKER_HOST "mkdir -p $PROJECT_FOLDER"

# copia i file per l'esecuzione del docker compose
rsync -auvh --progress -e ssh ./docker-compose.stage.yaml $DOCKER_HOST:$PROJECT_PATH/docker-compose.yaml
rsync -auvh --progress -e ssh ./assets $DOCKER_HOST:$PROJECT_PATH/

# aggiorna i posts da git
ssh root@$DOCKER_HOST "mkdir -p $PROJECT_PATH/assets/blog"
rsync -auvh --progress -e ssh /Volumes/DagStorage/dagtech/posts $DOCKER_HOST:$PROJECT_PATH/assets/blog/

# esegue doker compose
ssh  root@$DOCKER_HOST "docker pull $IMAGE_WEB && docker pull $IMAGE_PHP"
ssh  root@$DOCKER_HOST "cd $PROJECT_PATH && docker compose up -d --force-recreate --pull always"
ssh  root@$DOCKER_HOST "docker image prune -f"
