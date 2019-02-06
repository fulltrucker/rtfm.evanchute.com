---
title: 'Upgrading PHP in the CLI'
taxonomy:
    category:
        - docs
---

## Background
After installing Grav on a MAMP controlled local dev environment (this one, actually), I found that the grav Package manager (GMP) wouldn't run in the version of PHP that came with my Mac. The Mac was on version 5.5.38 when I started:
```shell
PHP 5.5.38 (cli) (built: Oct 29 2017 20:49:07) 
Copyright (c) 1997-2015 The PHP Group
Zend Engine v2.5.0, Copyright (c) 1998-2015 Zend Technologies
```
So what's a boy to do?
## Attempt #1
Basically I [found an article](https://coolestguidesontheplanet.com/upgrade-php-on-osx/) that instructed me to run a command in the shell that installs php 5.6 from some dude's repo somewhere, and then add it to my path. The command was/is:
```shell
$ curl -s http://php-osx.liip.ch/install.sh | bash -s 5.6
```
I got the instruction to add it to my path from the comments on this article. It was one of the follwing things:
```shell
$ export PATH="/usr/local/php/bin:/opt/local/share/man:/opt/local/bin:/opt/local/sbin:/usr/local/mysql/bin:$PATH"
```
or
```shell
$ export PATH=/usr/local/php5/bin:$PATH
```
I think it was the second. I'm fairly certain (though I didn't copypasta it) that the `php -v` command yielded the following after all these shenanigans:
```shell
PHP 5.6.0 (cli) (built: Oct 16 2014 08:24:05)
Copyright (c) 1997-2014 The PHP Group
Zend Engine v2.6.0, Copyright (c) 1998-2014 Zend Technologies
with Xdebug v2.2.5, Copyright (c) 2002-2014, by Derick Rethans
```
And this worked just fine. GMP ran, everything seemed great. But I'm a nerd, so for whatever reason I wanted to do this with [Homebrew](https://brew.sh/).

## Attempt #2

I found somewhere on the internet that [Homebrew](https://brew.sh/) would handle all this for me, so I went ahead and deleted the PHP 5.6 that had been installed, and removed it form my path, and then hurridly went about using [Homebrew](https://brew.sh/) to install it. Hallelujah!

Oh wait... 

Turns out, all the PHP stuff had been deprecated about a year ago. But that didn't stop me from running `brew install php` in the CLI, and watching it download and install a BUNCH of packages. Everything except actual PHP, I think. And on top of that, I got a bunch of warnings about my OS being Too Old For This Shit™ and maybe things weren't gonna work all that well?

Sumbitch.

## Attempt #3

So here's where I am now: I found an article on the [Grav blog](https://getgrav.org/blog/macos-mojave-apache-multiple-php-versions) detailing how to **actually** do this with [Homebrew](https://brew.sh), as well as some [instructions for cleaning up my mess](https://getgrav.org/blog/macos-mojave-apache-upgrade-homebrew). Sweet.

So I followed [those instructions](https://getgrav.org/blog/macos-mojave-apache-upgrade-homebrew), then I ran

```shell
$ brew tap exolnet/homebrew-deprecated
```

...which got me that keg. Keg? Yeah, I think so. Anyways, this keg is supposed to have all the deprecated PHP stuffs in it. Hallelujah! I decided I am only going to experiment with PHP 5.6 for the now, so I did a

```shell
$ brew install openldap libiconv
```

And that seemed to go just fine. `openldap` was already installed, so [Homebrew](https://brew.sh) installed `libiconv` for me, then the next command seemed to install PHP 5.6 just fine. I did see the following message here:

>>>> libiconv is keg-only, which means it was not symlinked into /usr/local, because macOS already provides this software and installing another version in parallel can cause all kinds of trouble.
>>>>
>>>> If you need to have libiconv first in your PATH run:
>>>>   echo 'export PATH="/usr/local/opt/libiconv/bin:$PATH"' >> ~/.bash_profile
>>>>
>>>> For compilers to find libiconv you may need to set:
>>>>
>>>>   export LDFLAGS="-L/usr/local/opt/libiconv/lib"
>>>>
>>>>   export CPPFLAGS="-I/usr/local/opt/libiconv/include"
>>>>

So I might need to do something about that after a bit. Then we did a

```shell
$ brew install php@5.6
```

And got some warnings, and what is probably a failure message. Basically, I think this tutorial is for newer versions of the MacOS than I have, so it's not gonna work. I don't see `php` when I do a `$ brew list` and running this command tells me PHP 5.6 ain't installed:

```shell
$ brew link --force --overwrite php@5.6
```

So I think we're back to square one... or rather Attempt #1, to sort this out. I've just got SO much additional whatnot in here... here being in my [Homebrew](https://brew.sh) list.

## Attempt #4 (and probably #5 if I'm being honest)

So I went back to the [first article I had found](https://coolestguidesontheplanet.com/upgrade-php-on-osx/) that instructed me to run a command in the shell which installs php 5.6 from some dude's repo somewhere, and then add it to my path. Ran this:

```shell
$ curl -s http://php-osx.liip.ch/install.sh | bash -s 5.6
```

Then got to thinking that I oughtta attempt to clean up that Homebrew list, and since I had saved the Terminal output from the `brew install php` command I had run I was able to get a list of all the `formulae` that were installed as dependancies of `php` even though that `formula` didn't install. After some trial and error, I landed on this list to remove: 

```shell
$ brew remove apr apr-util pkg-config gdbm readline sqlite xz python sphinx-doc cmake brotli cunit c-ares jansson jemalloc libev nghttp2 pcre argon2 aspell autoconf libidn libmetalink libssh2 openldap rtmpdump curl-openssl libtool unixodbc freetds libpng freetype automake libxml2 itstool docbook docbook-xsl icu4c boost source-highlight gtk-doc libffi httpd
```

So of course I "accidentally" re-brewed `php@5.6` and the `curl` command didn't work. Good lord. Enter the actual [site where the curl command came from](https://php-osx.liip.ch/) to the rescue. I followed the [Uninstall](https://php-osx.liip.ch/#uninstall) and Reinstall destructions, though I didn't find all the files and configs listed. But I did get all the extra Homebrew stuff uninstalled, dependancies removed, and finaly able to run the `curl` command successfully. Now I have a nice, neat version of PHP5.6 running in the CLI:

```shell
$ php -v
PHP 5.6.36 (cli) (built: Jul  3 2018 12:32:05) 
Copyright (c) 1997-2016 The PHP Group
Zend Engine v2.6.0, Copyright (c) 1998-2016 Zend Technologies
    with Zend OPcache v7.0.6-dev, Copyright (c) 1999-2016, by Zend Technologies
    with Xdebug v2.5.3, Copyright (c) 2002-2017, by Derick Rethans
```

### Salut!

![Homebrew_logo.png](../Homebrew_logo.png)