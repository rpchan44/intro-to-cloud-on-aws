#!/bin/sh

sudo yum install -y httpd php8.3 php8.3-cli php8.3-modphp.x86_64 php8.3-mysqlnd.x86_64 git-core.x86_64 htop
sudo chkconfig httpd on
sudo systemctl start httpd
