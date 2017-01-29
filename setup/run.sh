#!/usr/bin/env bash
# ./setup/run.sh <functionName>

production.container() {
    # IMPORTANT: should open port 8085 to localhost from docker-machine.
    # Doesn't work inside docker-machine even if port is open for localhost. Only works directly on host.
    # Run production containers.
    docker-compose -f ./setup/container/production.dockerCompose.yml up
}

production.stack() { # TODO: 
    docker-compose -f ./setup/container/production.dockerCompose.yml up
}

production.service() { # TODO: 
    docker service create --name webappDentristApp --network webappDentrist dentristwebapp:latest
    docker service create --name webappDentristMysql --network webappDentrist mysql:latest
    docker service create --name webappDentristPhpmyadmin --network webappDentrist phpmyadmin:latest
}

development() { # ⭐
    docker-compose -f ./setup/container/development.dockerCompose.yml up
}

deployment.build() { # ⭐
    # development / production
    export DEPLOYMENT=production
    export DEPLOYMENT=development

    docker-compose -f ./setup/container/deployment.dockerCompose.yml up buildDistributionCode
}

deployment.test() { # ⭐
    docker-compose -f ./setup/container/deployment.dockerCompose.yml up localUnitTest
}

deployment.staging() { # ⭐
    # USAGE: docker-compose -f ./setup/deployment.dockerCompose.yml -f ./setup/development.dockerCompose.yml up --build wordpress localStagingTest
    # USAGE: docker-compose -f ./setup/deployment.dockerCompose.yml up --rm localStagingTest

    docker-compose -f ./setup/container/deployment.dockerCompose.yml -f ./setup/container/development.dockerCompose.yml up wordpress localStagingTest
}

deployment.buildImage() { # ⭐
    # development / production
    export DEPLOYMENT=production
    export DEPLOYMENT=development
    # export COMPOSE_PROJECT_NAME=dentrist # Not needed as name is taken from image field.

    docker-compose -f ./setup/container/deployment.dockerCompose.yml build buildImage
}

# Important: call arguments verbatim. i.e. allows first argument to call functions inside file. So that it could be called as "./setup/run.sh <functionName>".
$@
