#!/bin/bash

if [ -z "$1" ]; then 
    #⭐ Git - install git:
    apt-get install git-all -y
    # for adding "add-apt-repository" command. 
    # apt-get install -y software-properties-common
    # apt-get install python3-software-properties
    # apt-get install python-software-properties
elif [ $1 == "uninstall" ]; then
    apt-get remove git-all -y
fi;

