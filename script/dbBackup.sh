#!/bin/sh

#----------------------------------------------------------
# a simple mysql database backup script.
# version 2, updated june 26, 2022.
# copyright 2011 SPACS TELECON
#----------------------------------------------------------

# (1) set up all the mysqldump variables
FILE=ipbxBackup.sql.`date +"%Y%m%d"`
DBSERVER=localhost
DATABASE=ipbx
USER=root
PASS=Ibm@2308

path="/home/admin/Documents/DbBackup/"
timestamp=$(date +%Y%m%d_%H%M%S)    
filename=Db_Backup_ipbx_$timestamp.sql    
log=$path$filename
days=7
START_TIME=$(date +%s)

find $path -maxdepth 1 -name "*.sql"  -type f -mtime +$days  -print -delete >> $log

echo "--Backup:: Script Start -- $(date +%Y%m%d_%H%M)" >> $log

# use this command for a database server on localhost. add other options if need be.
mysqldump --opt --user=${USER} --password=${PASS} ${DATABASE} >> $log


END_TIME=$(date +%s)

ELAPSED_TIME=$(( $END_TIME - $START_TIME ))
echo "--Backup:: Script End  -- $(date +%Y%m%d_%H%M)" >> $log

rsync -avh /home/admin/Documents/DbBackup/ /run/media/admin/DbBackup/DbBackup/DbBackup/ --delete

rsync -a /home/admin/Documents/DbBackup /run/media/admin/DbBackup/DbBackup/

