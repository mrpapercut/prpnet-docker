#!/bin/sh

# Abort on any error (including if wait-for-it fails).
set -e

envsubst < database.conf > database.ini
envsubst < prpserver.conf > prpserver.ini

# Wait for the backend to be up, if we know where it is.
./waitforit.sh "mysql:3306"

# Run the main container command.
exec "$@"
