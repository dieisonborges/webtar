#!/bin/bash
#Coletor de Bilhetes
#Chame este arquivo no crontab -e
cd /var/www/webtar/scripts/cron_txt_to_mysql/
php5 cron_index_coleta.php >> /var/www/webtar/docs/log.html
exit
