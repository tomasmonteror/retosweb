#!/bin/bash

for i in 1 2 5 6; do
 docker stop ejercicio${i}
done

docker stop ejercicio3app
docker stop ejercicio3mysql
