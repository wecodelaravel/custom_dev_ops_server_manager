## Configuration Manager Install


<a name="section-1">

## THIS IS PRETTY SIMPLE AND STRAIGHT FORWARD

From the command line / bash go the root directory that was setup in the last set of instructions you can find here: [Server Setup](/docs/{{version}}/server-setup)

Make sure your private key is added to the server for the bitbucket repo. on windows run the following commands after you upload or copy your private key to ~ /.ssh/

```bash
# In .ssh folder make sure you chmod your private key 600
sudo chmod 600 {private.key.file}
ssh-agent
eval "$(ssh-agent)"

ssh-add {private.key.file}
```
If your site directory is not empty then remove everything from it. 

Now from that empty site doc root directory run this command

```bash

```
Once that is done run this command but make sure you have the correct root directory. In my case its the /cm/

```bash
sudo find /var/www -type f -exec chmod 777 {} \; && sudo chmod -R 777 /var/www/html/cm/storage

```


If the MYSQL DB is setup and ready to go then you want copy the code below and save it to a .env file in the root of the main directory.


```bash
APP_NAME=CM
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://example.com

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST={{ FILL IN THE CONNECTION DETAILS HERE }}
DB_PORT=3306
DB_DATABASE={{ FILL IN THE CONNECTION DETAILS HERE }}
DB_USERNAME={{ FILL IN THE CONNECTION DETAILS HERE }}
DB_PASSWORD={{ FILL IN THE CONNECTION DETAILS HERE }}

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

```

<a name="section-2">

### Commands to Run
 
1. Clone files into site document root directory
2. Copy env info into a .env file in doc root
    * make sure you add the correct details needed to the following
        * DB_HOST=
        * DB_DATABASE=
        * DB_USERNAME=
        * DB_PASSWORD=
3.  On command line run these commands in this order
    1. composer install
    2. composer update
    3. composer du
    4. php artisan (test you get options and its working)
    5. php artisan migrate
    6. php artisan db:seed
    7. php artisan channels:update-all

Ok go to the site and it should be working now. if not come get me to go fix the issue stopping it.  

COMMAND LIST AS FOLLOWS
```bash 
composer install
composer update
composer du
php artisan (test you get options and its working)
php artisan migrate
php artisan db:seed
hp artisan channels:update-all
```









---
- [Site Install](#section-1)
- [Install Commands](#section-2)
