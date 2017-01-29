FROM node:latest
MAINTAINER SZN
COPY ./source /tmp/source

# Copy all shellScript files and make them executable.
COPY ./setup/container/shellScript/ /tmp/shellScript/
# Apparently when copied from windows, execution permissions should be granted.
RUN find /tmp/shellScript/ -type f -exec chmod +x {} \;

RUN /tmp/shellScript/installDeploymentDependencies.sh