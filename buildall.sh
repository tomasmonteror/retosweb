#!/bin/bash

apt-get install docker.io

systemctl start docker
systemctl enable docker

for i in 1 2 4 5 6; do
  cd ejercicio${i}
  docker build -t ejercicio${i} .
  cd ..
done

cd ejercicio3/
  cd ejercicio3app
  docker build -t ejercicio3app .
  cd ..
  cd ejercicio3mysql
  docker build -t ejercicio3mysql .
  cd ..
cd ..


