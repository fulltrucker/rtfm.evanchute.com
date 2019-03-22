---
title: 'Off-line Content Creation'
taxonomy:
    category:
        - docs
routes:
  canonical: /grav-cms/offline-content-creation
---

As with a lot of things in my RTFM, this one came from Ginkgo Street. Eventually, I'll add some information and instructions on spinning up a [Grav site symlinked to a master repo](https://learn.getgrav.org/advanced/grav-development#github-setup) but for now this will work. As this document is a copypasta of Ginkgo documentation, this information is most certainly out of date. Please visit https://rtfm.ginkgo.st/~docs/grav/guides/off-line-content-creation for current documentation.

- Use git to edit content in a development environment.
- Structure commits meaningfully.
- Use branches and Pull-Requests.

## Create a Grav Base-install

`$ composer create-project --no-dev getgrav/grav project-dir/`

`$ cd project-dir`

`$ bin/gpm self-upgrade -y`

* upgrade after installing via composer because sometimes composer package is not up to date with the Stable release.

## Clone the Instance Repo
Remove the default `user/` directory and replace it with the git-sync'd repo:

`$ cd project-dir/`

`$ rm -rf user/`

`$ git clone git@github.com:ginkgostreet/fis-docs.git user`

Confirm that the `user/localhost` directory exists. If not, follow the [instructions for adding the dev-env config](/project%20setup) to the content repo.

Optional: pull-down the user/accounts directory, or else you will have to create a login for yourself.

`$ rsync -rv rtfm:/home/fis/public_html/user/accounts user/`

Otherwise, you can create a login from `/admin`, or use the cli:

`$ bin/plugin login`

## Create a .gitignore file

1. Create the file by doing a `touch .gitignore`

2. Update the file by doing `nano .gitignore` and adding:

   ```shell
   /*
   !/pages
   !/themes
   !/plugins
   !/config
   !/data
   !/localhost
   /localhost/config/security.yaml
   ```

## PHP built-in server

[https://learn.getgrav.org/basics/installation#running-grav-with-the-built-in-php-webserver-using-router-php](https://learn.getgrav.org/basics/installation#running-grav-with-the-built-in-php-webserver-using-router-php)

You can create a bash function to put in your `.bash_aliases` or `.profile` if you're on a Mac and don't have a `.bashrc` or `.bash_aliases` file.

```shell
grav-server() {
    test -z "$1" && docroot='./' || docroot="$1"
    test -z "$2" && port=8675 || port=$2
    php -S localhost:"$port" -t "$docroot" "$docroot"/system/router.php
}
alias startgrav='grav-server'
```

Both arguments are optional, using the current directory and the port 8947 by default.

`$ grav-server /var/www/grav 8888`

```shell
mzd☯ artichoke :>grav-server 
/var/www/grav/
PHP 7.2.10-0ubuntu0.18.04.1 Development Server started at Fri Feb  8 23:10:21 2019
Listening on http://localhost:8888
Document root is /var/www/grav
Press Ctrl-C to quit.

```
