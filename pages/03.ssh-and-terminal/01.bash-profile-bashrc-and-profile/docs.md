---
title: 'Shell Config Files i.e. What Goes Where'
menu: 'Shell Config Files'
taxonomy:
    category:
        - docs
---

This will be my documentation of an attempt to determine the differences between and what each of `.bash_profile`, `bashrc`, and `.profile` files are used for. It could get messy, but there are definite differences and likely an optimal setup. Oh, and I'll put [My Config](#my-config) in here as well.

## My Config

- I got rid of the `.profile` file in favor of the more "*nix standard" `.bashrc` and `.bash_profile` config
- `.bashrc` loads `.bash_profile`
- `.bash_profile` loads other dot files that are used for specific purposes
- `.bash_profile` is used primarily for command-oriented stuff like tab completion
- Aliases go in `.aliases`
- Paths go in `.paths`
- Functions go in `.functions`

## Discussion and Research

Whoa. This shit is confusing.

### So what's the difference in these files?

It appears the difference is when a file is loaded, and what for. The main difference with shell config files is that some are only read by "login" shells (eg. when you login from another host, or login at the text console of a local unix machine) and others that are read by "interactive" shells (as in, ones connected to a terminal (or pseudo-terminal in the case of, say, a terminal emulator running under a windowing system). 

#### Read by Login Shells:

- `.login`
- `.profile` 
- `.zlogin`

#### Read by Interactive Shells:

- `.bashrc`
- `.tcshrc` 
- `.zshrc`

And then there's the fact that `bash` complicates this in that `.bashrc` is **only read by a shell that's both interactive and non-login**, so anecdotally it sounds like many (most?) people end up telling their `.bash_profile` to also read `.bashrc` with something like:

```shell
[[ -r ~/.bashrc ]] && . ~/.bashrc
```

But you can also tell your `.bashrc` file to read your `.bash_profile` file like yay:

```shell
[ -n "$PS1" ] && source ~/.bash_profile;
```

Not sure which is better, but I think I'm going with Option 2 above. I'm thinking this is smart because basically, it seems like `.bash_profile` is used most often, so you want to still load it in the edge-case that your Terminal or whatever **just so happens** to load `.bashrc` instead. Good? Good.

### But what about the .profile file?

According to this [SE question](https://stackoverflow.com/questions/6751252/difference-between-profile-and-bash-profile-on-snow-leopard), the Mac OS X environment checks `.bash_profile`, `.bash_login`, `.profile` in this order. It will run whichever is the highest in the hierarchy, so, if you have `.bash_profile`, it will not check `.profile`.

And I've been peeking through a few [superuser](https://github.com/troyxmccall/dotfiles) [dotfile](https://github.com/mathiasbynens/dotfiles) [repos](https://github.com/janmoesen/tilde) and none of them are using the `.profile` file, only `.bashrc` and `.bash_profile`.  They're also fond of using non-system dotfiles (e.g. `.aliases`) which can then be loaded or read in using `.bash_profile`. This just keeps things quite a bit tidier in your home directory, and since I always have confusion about what goes where it seems like a good strategy. 

## Helpful Links and Reseach

- https://stackoverflow.com/questions/6751252/difference-between-profile-and-bash-profile-on-snow-leopard
- https://stackoverflow.com/questions/415403/whats-the-difference-between-bashrc-bash-profile-and-environment

## To-do and Future Plans

Put all my dotfiles into a repo. I like the name Tilde for this purpose. The local repo would _not_ be my home directory, but kept somewhere else like Documents. This would require a `bash` script that either symlinks or copies all the repo files into the home directory. Examples:

- https://github.com/troyxmccall/dotfiles
- https://github.com/janmoesen/tilde
- https://github.com/mathiasbynens/dotfiles