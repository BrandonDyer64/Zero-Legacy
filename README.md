# zero
The code for the older version of the Zero database, developed in PHP. This repository is not archived, and may experience intermittent development activity.

The new Zero is being developed [here](https://github.com/BrandonDyer64/Zero).

Find information on how to install and configure Zero in our wiki.

# Installing Zero
## Clone Repository
### Clone
Navigate to the web root and clone the repository from GitHub.
```sh
cd /var/www/html
git clone https://github.com/BrandonDyer64/zero
```
If the clone is unsuccessful ask an administrator to add you as a collaborator.

Rename the directory from `zero` to `host`.
```sh
mv ./zero ./host
```

## Install Zero
### Download Installer
Navigate to the web root of the server and download the installer.
```sh
cd /var/www/html
mkdir zero
cd zero
wget http://zerodatabase.com/host/app/index.php
```
### Set Permissions
```sh
cd ..
chmod -R 777 zero
chown -R www-data.www-data zero
```
### Setup configurations
Open a browser to IP.IP.IP.IP/zero.
This will copy over all of the necessary files to run a Zero instance.

### Create the SQL database
```sh
mysql -u root -p
# Enter root password
create database zero;
exit
```
To get the root password for MySQL:
```sh
cat /root/.digitalocean_password
```

### Set the configurations
Open the config JSON file and set the required fields. Most important are the admin password and MySQL password.
```sh
nano zero/config/config.json
```
This is what you should see:
```json
{
   "name": "Name of Server",
   "token": "update_token_12345678901234567890",
   "admin": {
      "password": "changeme"
   },
   "database": {
      "host": "localhost",
      "username": "root",
      "password": "123456789012345678901234567890",
      "database": "zero"
   },
   "logging": {
      "errors": true,
      "log": true
   },
   "formatting": {
      "new_line": "<br>"
   },
   "updates": {
      "host": "http://IP.IP.IP.IP/host",
      "auto": false,
      "bleeding_edge": false,
      "force": false,
      "examples": true
   },
   "login": {
      "require": true
   },
   "files": {
      "index": "index.php"
   }
}
```
1. Set database to 'zero'
2. Add root password
3. Change admin password to something secure
4. Open a browser to example.com/zero
5. If it worked you will see a login screen
6. If not delete the zero directory and start over

### Create The Administrator Account
1. Login as `admin` using the password you set in the config
2. Add a new user by going to [?p=add&t=user](http://magentex.biz/zero?p=dev_link&link=p%3Dlist%26t%3Duser)
3. Log out
4. Log in as the new user
