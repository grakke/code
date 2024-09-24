#!/bin/bash

function configure_network() {
    local interface=$1
    local ip_address=$2
    local gateway=$3

    cat <<EOF >/etc/network/interfaces
auto $interface
iface $interface inet static
    address $ip_address
    gateway $gateway
EOF

    systemctl restart networking
    echo "Network configured on $interface"
}

configure_network "eth0" "192.168.1.100" "192.168.1.1"
