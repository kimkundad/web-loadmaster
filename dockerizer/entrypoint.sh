#!/bin/sh

# Ensure the storage and cache directories are writable
mkdir -p /app/storage/logs /app/bootstrap/cache
chown -R www-data:www-data /app/storage /app/bootstrap/cache
chmod -R 775 /app/storage /app/bootstrap/cache

# Start the main process
exec "$@"
