# CORS (Cross Origin Resource sharing) Tester

## Use case
It is usual that in different projects, you want to stop CORS protection temporarily.
For instance, when you are in a website project and your frontend stack is on reactjs.

This can be done with different solutions, but it is needed to test if this protection is really down.

## Structure
This project is about a simple docker that calls a php index, which can call the target url by adjusting a few parameters.

## Requirements
latest version of `docker` is the only requirement

mine is: v20.10.19 when I designed this 

## Getting started
1. make a `.env` file from the `.env.example`
2. update `.env` file with your preferred customizations
3. run `./start.sh`
4. on your browser, follow the `localhost` url that you got in step 3

## Bash details
### start.sh
runs the docker with proper messages, then shows an independent live log, which you can stop it (CTRL+C) whenever you want, without stopping the docker container 

### restart.sh
stops the current docker and re-runs it

it is useful when you want to update `.env` parameters

### stop.sh
stops the current docker