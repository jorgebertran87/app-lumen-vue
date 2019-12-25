#!/bin/bash

cd ./database/backups && mysql --max_allowed_packet=100M -h mysql -uroot -proot < employees.sql
