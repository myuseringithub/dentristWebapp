#!/usr/bin/env bash
# ./setup/run.sh <functionName>

production.container() {
    # IMPORTANT: should open port 8085 to localhost from docker-machine.
    # Doesn't work inside docker-machine even if port is open for localhost. Only works directly on host.
    # Run production containers.
    docker-compose -f ./setup/container/production.docker-compose.yml up
}

production.service() {
    docker service create --name webapp-dentrist --network go-demo <image>:<version>
}

development() {
    docker-compose -f ./setup/container/development.docker-compose.yml up
}

deployment.build() {
    docker-compose -f ./setup/container/deployment.docker-compose.yml up buildSourceCode
}

deployment.test() {
    docker-compose -f ./setup/container/deployment.docker-compose.yml up localUnitTest
}

deployment.staging() {
    docker-compose -f ./setup/container/deployment.docker-compose.yml -f ./setup/container/development.docker-compose.yml up wordpress localStagingTest
}

# IMPORTANT: call arguments verbatim. i.e. allows first argument to call functions inside file. So that it could be called as "./setup/run.sh <functionName>".
$@
