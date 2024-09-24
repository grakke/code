#!/bin/bash

function add_user() {
    local username=$1
    useradd "$username" && echo "User $username added successfully"
}

function remove_user() {
    local username=$1
    userdel "$username" && echo "User $username removed successfully"
}

case $1 in
add)
    add_user "$2"
    ;;
remove)
    remove_user "$2"
    ;;
*)
    echo "Usage: $0 {add|remove} <username>"
    exit 1
    ;;
esac
