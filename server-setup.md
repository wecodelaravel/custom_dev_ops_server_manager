# CONFIGURATION MANAGER 
## SERVER SETUP INSTRUCTIONS

ONCE YOU HAVE A VM SETUP AND YOU CAN SSH INTO IT FOLLOW THESE NEXT SECTIONS TO GET THE SERVER SETUP TO INSTALL THE CONFIGURATION MANAGER

<a name="section-1">

IF YOU NEED TO ADD THE SITE TO YOUR SSH 
IN A NEW CMD LINE WINDOW RUN THIS COMMAND

```bash
ssh -A -o UserKnownHostsFile=/dev/null -o StrictHostKeyChecking=no -p '22' '10.124.192.35' bash -ls

```

<a name="step-1">

<larecipe-card>
    <larecipe-badge type="success" circle class="mr-3" icon="fa fa-gears"></larecipe-badge>STEP 1: INSTALL APACHE2
    <larecipe-progress type="success" :value="00"></larecipe-progress>
</larecipe-card>

THE FIRST STEP TO GET VIRTUAL HOSTING CONFIGURED ON APACHE2 IS TO INSTALL APACHE2. IF YOU DON’T HAVE APACHE2 INSTALLED, YOU’RE NOT GOING ANYWHERE. TO INSTALL APACHE2, RUN THE COMMANDS BELOW.

```bash
sudo apt-get update
sudo apt-get install apache2
```


<a name="step-2">

<larecipe-card>
    <larecipe-badge type="success" circle class="mr-3" icon="fa fa-gears"></larecipe-badge>STEP 2: CREATE VIRTUAL HOSTING CONFIGURATION FILES
    <larecipe-progress type="success" :value="10"></larecipe-progress>
</larecipe-card>

NOW THAT APAHCE2 IS INSTALLED, ALL YOUR VIRTUAL HOST CONFIGURATIONS FILE WILL LIVE IN THE DIRECTORY BELOW. EACH FILE WILL END IN .CONF.

```bash
/etc/apache2/sites-available/ 
alias vhosts='cd /etc/apache2/sites-available/'
```
RUN EACH OF THE LINE BELOW TO CREATE NEW VIRTUAL HOST CONFIGURATION FILE.

```bash
sudo subl /etc/apache2/sites-available/cm.conf
```

<a name="step-3">

<larecipe-card>
    <larecipe-badge type="success" circle class="mr-3" icon="fa fa-gears"></larecipe-badge>Step 3: Configure VirtualHost Files
    <larecipe-progress type="success" :value="20"></larecipe-progress>
</larecipe-card>

NOW THAT YOUR CREATED A VIRTUAL HOST FILE, YOU CAN COPY AND PASTE THE CODES BELOW INTO THE FILE AND SAVE. EACH CONFIGURATION FILE WILL HAVE INFORMATION ON THE WEBSITE AND DOMAIN IT CONTROLS IF YOU NEED TO ADD MORE SITES DO THE SAME FOR THE ADDTIONAL ONES.

COPY THE BLOCK AND PASTE THE BLOCK OF CODE BELOW IN EACH FILE CORRESPONDING WITH EACH WEBSITE OR DOMAIN.

```apache
<VirtualHost *:80>
    ServerName d-gp2-aacm-1.imovetv.com
    ServerAlias cm.imovetv.com
    ServerAdmin pmadsen@localhost
    DocumentRoot /var/www/html/cm/public
    ErrorLog /var/www/html/cm/error.log
    CustomLog /var/www/html/cm/cm.access.log combined
 

            <IfModule mime_module>
                AddHandler application/x-httpd-php73 .php .php5 .php4 .php3
            </IfModule>   
            # ErrorLog /var/log/apache2/cm.error.log
            # CustomLog ${APACHE_LOG_DIR}/cm.access.log combined
            # LogLevel warn
            # <FilesMatch \.php$>
            # SetHandler application/x-httpd-php
            # </FilesMatch>
            <Directory /var/www/html/cm/*>
                Options FollowSymLinks
                AllowOverride All
                Order allow,deny
                allow from all
            </Directory>
</VirtualHost>
```

OPEN THE FILLOWING FILE AND ADD THESE LINES CHANGE IP TO THE LOCALHOST IP OF THE SERVER THIS WAY MYSQL WILL CONNECT EASIER AND YOU CAN ALSO SETUP EXTERNAL ACCESS TO THE MYSQL DB WHEN ITS SETUP.

> OPEN > /etc/mysql/my.cnf
===============

```apache
[mysqld]

bind-address = 10.124.167.2
port = 3306
```
--------
CREATE THE SITE DIRECTORY -  THIS IS WHERE THE SITE FILES WILL BE.

```bash
sudo mkdir -p /var/www/html/cm
# sudo mkdir -p /var/www/html/virtualhost1.com
# sudo mkdir -p /var/www/html/virtualhost2.com
# sudo mkdir -p /var/www/html/virtualhost3.com

```

<a name="step-4">

<larecipe-card>
    <larecipe-badge type="success" circle class="mr-3" icon="fa fa-gears"></larecipe-badge>STEP 4: ENABLE EACH SITE
    <larecipe-progress type="success" :value="30"></larecipe-progress>
</larecipe-card>

NOW THAT YOU CREATED THE VIRTUAL HOST CONFIGURATION FILE, YOU MUST ENABLE IT. RUN THE COMMAND BELOW FOR EACH OF THE VIRTUAL HOSTS YOU CREATED.

```bash
sudo a2ensite cm.conf
# sudo a2ensite virtualhost1.conf
# sudo a2ensite virtualhost2.conf
# sudo a2ensite virtualhost3.conf

sudo service apache2 reload
```

<a name="step-5">

<larecipe-card>
    <larecipe-badge type="success" circle class="mr-3" icon="fa fa-gears"></larecipe-badge>STEP 5: RESTART APACHE2
    <larecipe-progress type="success" :value="40"></larecipe-progress>
</larecipe-card>

FINALLY, RUN THE COMMANDS BELOW TO RESTART APACHE2 WEBSERVER.

```bash
sudo systemctl restart apache2
```

TURN OFF DEFAULT VHOST

```bash
sudo a2dissite 000-default.conf
```



<a name="section-2">

<larecipe-card>
    <larecipe-badge type="success" circle class="mr-3" icon="fa fa-gears"></larecipe-badge>UPGRADE PHP
    <larecipe-progress type="success" :value="50"></larecipe-progress>
</larecipe-card>


> {warning} FIRST MAKE A LIST OF ALL PHP CURRENTLY INSTALLED JUST IN CASE. 

If you are upgrading PHP from an earlier version, it's important to make sure you ensure you have the same PHP extensions installed. PHP 7.2 onwards no longer include mcrypt extension. Other than that, PHP 7.3 includes all extensions that were in PHP 7.1 and 7.2.


```bash
dpkg -l | grep php | tee packages.txt
```

### Install PHP 7.3

##### PHP 7.3 core files
This will install PHP 7.3 core extensions and PHP 7.3 CLI.

```bash
sudo add-apt-repository ppa:ondrej/php
sudo add-apt-repository ppa:ondrej/apache2

sudo apt-get update
sudo apt install php7.3 php7.3-common php7.3-cli
```

##### PHP 7.3 extensions
You can now install the remaining packages as necessary. If you are setting up a new setup, or have no clear idea which packages to install, I highly recommend installing the following packages from the command below. If you are upgrading, look at the packages.txt file to see your current list.

```bash 
sudo apt install php7.3-bcmath php7.3-bz2 php7.3-curl php7.3-gd php7.3-intl php7.3-json php7.3-mbstring php7.3-readline php7.3-xml php7.3-zip
```


##### PHP 7.3 for web server
With all these packages in place, you might also need to integrate PHP with your web server. If you are using Nginx, or Apache with mod_event, you will need to install php7.3-fpm package. If you are using PHP as an embedded Apache module, you will need libapache2-mod-php7.3 package. For Apache, you can run **apachectl -V** to see your current MPM, whether its prefork or event.

Output of apachectl -V looks something like this.

```bash

Server version: Apache/2.4.39 (Ubuntu)
Server built:   2019-04-02T20:30:08
Server's Module Magic Number: 20120211:84
Server loaded:  APR 1.6.2, APR-UTIL 1.6.0
Compiled using: APR 1.6.2, APR-UTIL 1.6.0
Architecture:   64-bit
Server MPM:     prefork
  threaded:     no
    forked:     yes (variable process count)
Server compiled with....
 -D APR_HAS_SENDFILE
 -D APR_HAS_MMAP
 -D APR_HAVE_IPV6 (IPv4-mapped addresses enabled)
 -D APR_USE_SYSVSEM_SERIALIZE
 -D APR_USE_PTHREAD_SERIALIZE
 -D SINGLE_LISTEN_UNSERIALIZED_ACCEPT
 -D APR_HAS_OTHER_CHILD
 -D AP_HAVE_RELIABLE_PIPED_LOGS
 -D DYNAMIC_MODULE_LIMIT=256
 -D HTTPD_ROOT="/etc/apache2"
 -D SUEXEC_BIN="/usr/lib/apache2/suexec"
 -D DEFAULT_PIDLOG="/var/run/apache2.pid"
 -D DEFAULT_SCOREBOARD="logs/apache_runtime_status"
 -D DEFAULT_ERRORLOG="logs/error_log"
 -D AP_TYPES_CONFIG_FILE="mime.types"
 -D SERVER_CONFIG_FILE="apache2.conf"



```

**YOU CAN CLEARLY SEE THIS PREFORK ON THIS LINE YOU IN MY CASE I WOULD PICK THE 2ND COMMAND TO RUN** 

```BASH 
Server MPM:     prefork
```


###### IF > Nginx and Apache with event MPM

```bash
sudo apt install php7.3-fpm
```

###### IF > Apache with **PREFORK** MPM

```bash
sudo apt install libapache2-mod-php7.3
```



##### Test if PHP 7.3 is properly installed
Once everything is installed, run php -v to make sure PHP 7.3 (CLI) is installed.

```bash
PHP 7.3.6-1+ubuntu16.04.1+deb.sury.org+1 (cli) (built: May 31 2019 11:06:26) ( NTS )
Copyright (c) 1997-2018 The PHP Group
Zend Engine v3.3.6, Copyright (c) 1998-2018 Zend Technologies
    with Zend OPcache v7.3.6-1+ubuntu16.04.1+deb.sury.org+1, Copyright (c) 1999-2018, by Zend Technologies

```



##### Remove old PHP versions

```BASH 
# Change 7.1 with whatever current version you have.
sudo apt purge php7.1 php7.1-common 
```

So that's it, you should have PHP 7.3 running. Note that automatic upgrades (unattended-upgrades) will not work on Ondrej's PPA, so you still need to manually upgrade your PHP versions. Make sure to run apt update and apt upgrade to upgrade to the latest PHP version.

```bash 

sudo apt-get install php libapache2-mod-php
sudo a2enmod mpm_prefork && sudo a2enmod php7.3

sudo apt update
sudo apt upgrade
```

 
<larecipe-card>
    <larecipe-badge type="success" circle class="mr-3" icon="fa fa-gears"></larecipe-badge>PHP 7.3 INSTALLED
    <larecipe-progress type="success" :value="80"></larecipe-progress>
</larecipe-card>


<larecipe-card>
    <larecipe-badge type="success" circle class="mr-3" icon="fa fa-gears"></larecipe-badge>INSTALL THESE ADDITIONAL PACKAGES AND CONFIG MODS
    <larecipe-progress type="success" :value="85"></larecipe-progress>
</larecipe-card>


VERY IMPORTNANT THIS IS INSTALLED

```bash
curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer
sudo chown -R $USER ~/.composer/
```

Test it was installed by simply typing composer 

```bash 
composer
```

Returns this is successful

```bash
   ______
  / ____/___  ____ ___  ____  ____  ________  _____
 / /   / __ \/ __ `__ \/ __ \/ __ \/ ___/ _ \/ ___/
/ /___/ /_/ / / / / / / /_/ / /_/ (__  )  __/ /
\____/\____/_/ /_/ /_/ .___/\____/____/\___/_/
                    /_/
Composer version 1.8.6 2019-06-11 15:03:05
```

You might need to run this to tell bash to use composer 
```bash
echo 'export PATH="$HOME/.composer/vendor/bin:$PATH"' >> ~/.bashrc
```




These following packages also need to be installed.
---------------------------

```BASH
# these top ones are needed 
sudo apt install php-xml
sudo apt-get install ppa-purge
sudo apt-get install php7.3-mysql
sudo phpenmod pdo_mysql
sudo a2enmod rewrite
sudo apt install curl
sudo apt-get install php-curl
sudo apt-get install php7.3-gd
sudo apt-get install php7.3-zip 

sudo apt autoremove
sudo systemctl restart apache2

sudo apt-get install yum
sudo apt-get install source-highlight
sudo apt-get install python-pygments
sudo a2enmod headers
sudo a2enmod rewrite
sudo apt-get install lshw


sudo add-apt-repository ppa:mc3man/trusty-media  
sudo apt-get update  
sudo apt-get install ffmpeg  
sudo apt-get install frei0r-plugins  

```

To install Apache web server, run the following command on your server:

apt install apache2
After installing Apache2, use the command below to start the Apache service:

systemctl start apache2
Also, you can enable Apache server to always startup when the server boots up:

systemctl enable apache2
You can always check the status of the Apache web service with this command:

systemctl status apache2


view startup log for apache sudo journalctl -xe

astatus='sudo systemctl status apache2'



> {danger} NOW I AM NOT SURE HOW TO FINISH IF WE DO NOT HAVE A EXTERNAL DB WE NEED TO INSTALL MYSQL OR IF NOT WE NEED TO GET HE MYSQL CONNECT DETAILS FROM THE THIRD PARTY?


<a name="section-3">

<larecipe-card>
    <larecipe-badge type="success" circle class="mr-3" icon="fa fa-gears"></larecipe-badge>IF NEEDED SETUP MYSQL
    <larecipe-progress type="success" :value="90"></larecipe-progress>
</larecipe-card>
 
  

---
- [Main Setup](#section-1)
- [STEP 1](#step-1)
- [STEP 2](#step-2)
- [STEP 3](#step-3)
- [STEP 4](#step-4)
- [STEP 5](#step-5)

- [Upgrade PHP](#section-2)
- [Install MYSQL](#section-3)
