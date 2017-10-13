#!/usr/bin/env bash

# This script simply checks for and deletes stale docs
# before generating a new set.

# NOTE: You may need to set executable permissions before
# using this file or the `$ composer docs` script.
#
# $ chmod u+x ./dev/docs.sh

DIRECTORY=./dev/docs

if [ -d $DIRECTORY ];
then
  printf "Deleting old generated documentation .. "

  rm -r $DIRECTORY/*

  echo "OK"

  exit
fi

echo "No stale documentation to remove"

exit
