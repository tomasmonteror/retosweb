#!/bin/bash

for i in 1 2 3app 3mysql 4 5 6; do
 docker stop ejercicio${i}
done
