#!/bin/bash
# System + MySQL backup script
# Full backup day - Sun (rest of the day do incremental backup)
# Copyright (c) 2005-2006 nixCraft <http://www.cyberciti.biz/fb/>
# This script is licensed under GNU GPL version 2.0 or above
# Automatically generated by http://bash.cyberciti.biz/backup/wizard-ftp-script.php
# ---------------------------------------------------------------------
### System Setup ###
DIRS="/pos/fannie"
BACKUP=/tmp/backup.$$
NOW=$(date +"%m-%d-%Y")
DAY=$(date +"%a")
FULLBACKUP="Sun"
### MySQL Setup ###
MUSER="is4cserver"
MPASS="is4cserver"
MHOST="localhost"
MYSQL="$(which mysql)"
MYSQLDUMP="$(which mysqldump)"
GZIP="$(which gzip)"
### FTP server Setup ###
FTPD="/home/nolafood/POSbak"
FTPU="pos@nolafood.coop"
FTPP="jq2vm6<tvtd/dx"
FTPS="ftp.nolafood.coop"
NCFTP="$(which ncftpput)"
### Other stuff ###
EMAILID="joelbrock@gmail.com"
### Start Backup for file system ###
[ ! -d $BACKUP ] && mkdir -p $BACKUP || :
### See if we want to make a full backup ###
if [ "$DAY" == "$FULLBACKUP" ]; then
  FTPD="/home/nolafood/POSbak/full"
  FILE="pos-full_$NOW.tar.gz"
  tar -zcvf $BACKUP/$FILE $DIRS
else
  i=$(date +"%Hh%Mm%Ss")
  FILE="pos-i_$NOW-$i.tar.gz"
  tar -zcvf $BACKUP/$FILE $DIRS
fi
### Start MySQL Backup ###
# Get all databases name
DBS="$($MYSQL -u $MUSER -h $MHOST -p$MPASS -Bse 'show databases')"
for db in $DBS
do
 FILE=$BACKUP/mysql-$db.$NOW-$(date +"%T").gz
 $MYSQLDUMP -u $MUSER -h $MHOST -p$MPASS $db | $GZIP -9 > $FILE
done
### Dump backup using FTP ###
#Start FTP backup using ncftp
ncftp -u"$FTPU" -p"$FTPP" $FTPS<<EOF
mkdir $NOW
cd $NOW
lcd $BACKUP
mput *
quit
EOF
### Find out if ftp backup failed or not ###
if [ "$?" == "0" ]; then
 rm -f $BACKUP/*
else
 T=/tmp/backup.fail
 echo "Date: $(date)">$T
 echo "Hostname: $(hostname)" >>$T
 echo "Backup failed" >>$T
 mail  -s "BACKUP FAILED" "$EMAILID" <$T
 rm -f $T
fi