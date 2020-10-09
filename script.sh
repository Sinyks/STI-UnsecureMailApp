#!/bin/bash

containerName='sti_project'

if [ -n "$(docker ps -aq --filter "name=${containerName}")" ]
then
  echo "suppression du container existant"
  docker rm $(docker stop $(docker ps -aq --filter "name=${containerName}"))
fi


docker run -ti -v "$PWD/site":/usr/share/nginx/ -d -p 8080:80 --name sti_project --hostname sti arubinst/sti:project2018

docker exec sti_project service nginx start
docker exec sti_project service php5-fpm start
