#!/bin/bash

cd ./database/backups && mysql --max_allowed_packet=100M -h mysql -uroot -p$(cat /scripts/db_root_password.txt) < employees.sql