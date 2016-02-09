# CakePHP MarketPlace

## Installation

- Download CakePHP VERSION 2.x
- Copy /lib folder, and paste in /
- Copy /app/tmp folder, and paste in /app/tmp
- Edit /app/Config/database.php
- Install database /database/database.sql

- Apply chmod 777 -R /app/tmp
- Apply chmod 777 -R /app/webroot/resources/app/img/banners
- Apply chmod 777 -R /app/webroot/resources/app/img/products
- Apply chmod 777 -R /lib - if you have problems with apache config



# For local installation please check this steps:

## 0) Enable mod_rewrite
http://stackoverflow.com/questions/869092/how-to-enable-mod-rewrite-for-apache-2-2

## 1) Clone the project

## 2) Set a virtual host:

`sudo subl /etc/hosts `

 ```
127.0.0.1	localhost
127.0.1.1	romelgomez

#127.0.0.1	www.jqtree-cakephp-example.com
127.0.0.2	www.cakephp-marketplace.net


# The following lines are desirable for IPv6 capable hosts
::1     ip6-localhost ip6-loopback
fe00::0 ip6-localnet
ff00::0 ip6-mcastprefix
ff02::1 ip6-allnodes
ff02::2 ip6-allrouters
```

`sudo subl /etc/apache2/sites-available/hack.conf `

```
# http://stackoverflow.com/questions/10873295/error-message-forbidden-you-dont-have-permission-to-access-on-this-server

ServerName 127.0.0.1:80

# www.santomercado.net
<VirtualHost 127.0.0.2:80>
 ServerName www.cakephp-marketplace.net
 DocumentRoot "/home/romelgomez/workspace/projects/cakephp-marketplace/app/webroot"
  DirectoryIndex index.php
  <Directory />
      Require all granted
      Options Indexes FollowSymLinks Includes ExecCGI
      AllowOverride All
      Order deny,allow
      Allow from all
  </Directory>
  <Directory "/home/romelgomez/workspace/projects/cakephp-marketplace/app/webroot">
    Options FollowSymLinks
    AllowOverride All
    Allow from all
  </Directory>
</VirtualHost>
```

#### then activate the new config

`a2ensite hack.conf`

For deactivate `a2ensite hack.conf`

Visit www.cakephp-marketplace.net, is very sure you will see many issues, for solve this problems check the other steps

## 3) Set database

The config database file is in /cakephp-marketplace/app/Config/database.php

## 4) There are directories that are constantly rewritten, they are:

To resolve this issues apply the following:

`chmod 777 -R /cakephp-marketplace/app/tmp`

`chmod 777 -R /cakephp-marketplace/lib`

`chmod 777 -R  /cakephp-marketplace/app/webroot/resources/app/img/products`

`chmod 777 -R  /cakephp-marketplace/app/webroot/resources/app/img/banners`

## 5) Install bower dependencies

In bash or terminal, go to `/app/webroot/resources` directory and run: `bower install`.

Notes:
 1) You must have installed `node` and `bower` first, to run this properly.
 2) To avoid this step, comment the local resources and uncomment the CDN or external resources in this files:

```
   /View/Layouts/coming-soon.ctp
   /View/Layouts/default.ctp
   /View/Layouts/landingPage.ctp
   /View/Layouts/login.ctp
   /View/Products/add.ctp
   /View/Products/drafts.ctp
   /View/Products/published.ctp
   /View/Products/search.ctp
   /View/Products/stock.ctp
   /View/Products/view.ctp
   /View/Users/login.ctp
   /View/Users/new_password_request.ctp
```

## NOTES:

- In local installation, maybe you will see error message when you try to create new user, this is because the system will try send one email for verify the user email, to avoid that, after create the new user just go to database and set [1] for email_verify of that new user. And then try login.