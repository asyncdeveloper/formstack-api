#!/bin/bash

cd /vagrant || exit
mkdir uploads
composer install
vendor/bin/phinx migrate -e development
vendor/bin/phinx seed:run -e development