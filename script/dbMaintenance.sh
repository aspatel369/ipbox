#!/bin/bash
> /var/log/testnode.log
find /var/log/aster_dial/ -mindepth 1 -mtime +5 -delete
echo "truncate table aster_manager" | mysql -u'root' -p'Ibm@2308' -D'ipbx';
echo "truncate table cel" | mysql -u'root' -p'Ibm@2308' -D'asteriskcdrdb';
/usr/bin/php /var/www/html/ipbx/script/week_script.php
