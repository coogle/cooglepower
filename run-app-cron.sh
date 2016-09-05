#!/bin/sh
cd /var/www
/usr/bin/env php artisan cron:run
