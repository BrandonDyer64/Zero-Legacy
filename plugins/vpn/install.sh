#!/bin/bash
wget https://git.io/vpn -O openvpn-install.sh
bash openvpn-install.sh
mv /root/client.ovpn /var/www/html/zero/plugins/vpn