#!/bin/sh

sudo yum install -y httpd php8.3 php8.3-cli php8.3-modphp.x86_64 php8.3-mysqlnd.x86_64 git-core.x86_64 htop mariadb105-server-utils.x86_64
sudo chkconfig httpd on
sudo systemctl start httpd
cd /home/ec2-user
su ec2-user -c "git clone https://github.com/rpchan44/intro-to-cloud-on-aws.git"
sudo chmod +x intro-to-cloud-on-aws/aws-rds/restore
sudo chown ec2-user:ec2-user intro-to-cloud-on-aws -R
cd intro-to-cloud-on-aws/aws-rds/
