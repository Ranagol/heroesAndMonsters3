#!/usr/bin/env bash
set -euo pipefail

workspace="$(cd "$(dirname "$0")/.." && pwd)"
container_root="/var/www/html"

translated_args=()
for arg in "$@"; do
    if [[ "$arg" == "$workspace"* ]]; then
        arg="$container_root${arg#$workspace}"
    fi
    translated_args+=("$arg")
done

docker compose exec -T php vendor/bin/phpunit \
    --configuration="$container_root/phpunit.xml" \
    "${translated_args[@]}"
