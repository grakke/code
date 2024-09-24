#!/bin/bash

set -e
trap 'echo "Update failed"; exit 1' ERR

apt-get update && apt-get upgrade -y

echo "System updated successfully"
