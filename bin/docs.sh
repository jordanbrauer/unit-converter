#!/usr/bin/env bash

# This script simply checks for and deletes stale docs
# before generating a new set.

# NOTE: You may need to set executable permissions before
# using this file or the `$ composer docs` script.
#
# $ chmod u+x ./dev/docs.sh

SOURCE=./src
DESTINATION=./docs

if [ -d $DESTINATION ];
then
  printf "Deleting stale documentation .. "
  rm -r $DESTINATION/*
  echo "OK"
fi

echo "No stale documentation to remove"
php -d memory_limit=-1 -f ./vendor/bin/apigen generate $SOURCE --destination $DESTINATION
exit
