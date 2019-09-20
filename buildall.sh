#!/bin/bash

apt-get install docker.io

systemctl start docker
systemctl enable docker

for i in 1 2 3app 3mysql 4 5 6; do
  cd ejercicio${i}
  docker build -t ejercicio${i} .
  cd ..
done

