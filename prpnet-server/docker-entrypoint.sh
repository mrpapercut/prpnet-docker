#!/bin/sh

# Abort on any error (including if wait-for-it fails).
set -e

envsubst < database.conf > database.ini
envsubst < prpserver.conf > prpserver.ini

# Wait for mysql to be up
./waitforit.sh -t 60 "mysql:3306"

# Run the main container command.
exec "$@"
