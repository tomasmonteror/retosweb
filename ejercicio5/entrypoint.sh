#!/bin/bash

source /etc/apache2/envvars
bash /var/www/app/loop.sh &
#tail -F /var/log/apache2/* &
exec apache2 -D FOREGROUND
