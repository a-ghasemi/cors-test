#!/bin/bash

wait(){
  read -n 1 -s -r -p "Press any key to start dockers"
}

./stop.sh
wait
./start.sh