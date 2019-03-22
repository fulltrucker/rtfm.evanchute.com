---
title: 'Homebrew is Your Friend'
taxonomy:
    category:
        - docs
routes:
  canonical: /macos-and-homebrew/homebrew-is-your-friend
---

Here's what I have brewing in my `brew list` at the moment:

```shell
bash			dart			libevent		make			python			thefuck
bash-completion@2	gdbm			libiconv		openssl			readline		tor
cabal-install		gettext			libidn2			pandoc			sass			wget
coda-cli		ghc			libscrypt		pcre2			sphinx-doc		xz
composer		git			libunistring		pkg-config		sqlite
```

This `brew list` was updated on  3/21/2019

## Common Commands

- `brew update`: Fetch the newest version of Homebrew and all formulae from GitHub using `git`(1) and perform any necessary migrations.
- `brew install` *formula*: Installs a package (formula) to your computer. [[options](https://docs.brew.sh/Manpage#install-options-formula)]
- `brew list`: List all installed formulae [[options](https://docs.brew.sh/Manpage#list-ls-options)]
- `brew commands`: Show a list of built-in and external commands [[options](https://docs.brew.sh/Manpage#commands-options)]
-  `brew config`: Show Homebrew and system configuration useful for debugging. If you file a bug report, you will likely be asked for this information if you do not provide it.

## Special Commands

- `bitches-brew or `brew-update`: Keeps casks up to date the right way by doing a `brew update && brew upgrade && brew cu -fa && brew cleanup && brew doctor && brew cask doctor` 
- `party-foul` or `partyfoul`: `brew cleanup -s --prune`

## Resources

- https://brew.sh/
- https://docs.brew.sh/Manpage
- https://docs.brew.sh/
- https://caskroom.github.io/
- https://devhints.io/homebrew

## Future Plans and To-do

I should do some sort of write-up on `tor` and how that's used, but I'll save it for another day. Things I use on the common are `git` and `sass` and probably `wget`. I recently [did a massive purge](/macos-homebrew-homebrew-system-shit/upgrading-php-in-the-cli#attempt-4-and-probably-5-if-im-being-honest) of brew formulae, so I am hoping I didn't uninstall anything important.

![Homebrew_logo.png](../Homebrew_logo.png)