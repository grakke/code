#!/bin/bash

threshold=80
partition="/dev/sda1"

usage=$(df -h | grep "$partition" | awk '{print $5}' | sed 's/%//')

if [[ "$usage" -gt "$threshold" ]]; then
    echo "Disk usage on $partition is above $threshold%"
    # Add code to handle high disk usage
fi
