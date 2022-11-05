#!/bin/bash

wait(){
  read -n 1 -s -r -p "Press any key to see live logs"
}

set_env(){
  unamestr=$(uname)
  if [ "$unamestr" = 'Linux' ]; then
    export $(grep -v '^#' .env | xargs -d '\n')
  elif [ "$unamestr" = 'FreeBSD' ] || [ "$unamestr" = 'Darwin' ]; then
    export $(grep -v '^#' .env | xargs -0)
  fi
}

unset_env(){
  unset $(grep -v '^#' .env | sed -E 's/(.*)=.*/\1/' | xargs)
}

# body
set_env

docker compose up -d
echo
echo "docker containers started"

echo
echo "use http://localhost:"${LOCAL_PORT:-8080}" to connect"

echo
wait
echo

echo "logs live"
echo
docker compose logs -f

unset_env