#!/bin/bash

for i in 1 2 4 5 6; do
   docker run -d --rm --publish=8${i}:80 --name ejercicio${i} ejercicio${i}
done

docker network create --driver bridge ejercicio3
docker run -d --network ejercicio3 --rm -e MARIADB_ROOT_PASSWORD=.SECRET.PASS. --name ejercicio3mysql ejercicio3mysql
docker run -d --network ejercicio3 --rm --publish=83:80 --name ejercicio3app ejercicio3app

docker ps
