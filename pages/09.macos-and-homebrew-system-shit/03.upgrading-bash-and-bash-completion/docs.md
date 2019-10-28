---
title: 'Upgrading Bash and Bash Completion'
taxonomy:
    category:
        - docs
routes:
  canonical: /macos-and-homebrew/upgrading-bash-and-bash-completion
---

Installing the Ginkgo Street [make-do](https://github.com/ginkgostreet/make-do) framework and [Grav Utilities](https://github.com/ginkgostreet/grav-util) necessitated upgrading the woefully old Bash 3.x that comes installed in Mac OS X to something more… modern. Fortunately, MZD has already done some of the legwork.

## Getting Bash 4+ Installed

So I started here: https://troymccall.com/better-bash-4--completions-on-osx/ and installed Bash 5 (!) using the super simple `brew install bash` command. After that I followed the instructions Homebrew gave me after install, which were consistent with the Troy McCall link, to add this new Bash to the system shell.

```shell
echo '/usr/local/bin/bash' | sudo tee -a /etc/shells;
chsh -s /usr/local/bin/bash;
```

## Install Bash Completion

On a whim, I searched Homebrew for `bash-completion` and found that `bash-completion2` was available as a formula, and I didn't need to tap the `versions` cask as the Troy guide indicated. Either that, or I already have that cask tapped and it just showed up. So, either way I just did a `brew install bash-completion2` and Bingo's Your monkey with the following output:

```shell
Updating Homebrew...
==> Auto-updated Homebrew!
Updated 2 taps (homebrew/cask and homebrew/core).
No changes to formulae.

Warning: You are using macOS 10.11.
We (and Apple) do not provide support for this old version.
You will encounter build failures with some formulae.
Please create pull requests instead of asking for help on Homebrew's GitHub,
Discourse, Twitter or IRC. You are responsible for resolving any issues you
experience, as you are running this old version.

==> Downloading https://github.com/scop/bash-completion/releases/download/2.8/bash-completion-2.8.tar.xz
==> Downloading from https://github-production-release-asset-2e65be.s3.amazonaws.com/51372862/2ddf8c90-29d6-11e8-98af-a2fda26430f4?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=AKIA
######################################################################## 100.0%
==> ./configure --prefix=/usr/local/Cellar/bash-completion@2/2.8
==> make install
==> Caveats
Add the following to your ~/.bash_profile:
  [[ -r "/usr/local/etc/profile.d/bash_completion.sh" ]] && . "/usr/local/etc/profile.d/bash_completion.sh"

If you'd like to use existing homebrew v1 completions, add the following before the previous line:
  export BASH_COMPLETION_COMPAT_DIR="/usr/local/etc/bash_completion.d"
==> Summary
🍺  /usr/local/Cellar/bash-completion@2/2.8: 667 files, 935.0KB, built in 15 seconds
```

### Configure bash completion

The Troy guide indicated that this would be what the `Caveats` section would say on install:

```shell
if [ -f $(brew --prefix)/share/bash-completion/bash_completion ]; then
    . $(brew --prefix)/share/bash-completion/bash_completion
 fi
```

But that looked wrong. Regardless, I chucked the following in my `.bash_profile`:

```bash
# Add tab completion for bash completion 2
if which brew > /dev/null && [ -f "$(brew --prefix)/share/bash-completion/bash_completion" ]; then
  source "$(brew --prefix)/share/bash-completion/bash_completion";
elif [ -f /etc/bash_completion ]; then
  source /etc/bash_completion;
fi;
```

I did a `cd` into a `git` repo to test it out, and there was no completion happening. So I added what the `Caveats` told me to add, reloaded the Terminal window, and did the same test. Again, no completion using the `git` command as a test. We did finally settle on using what Homebrew recommended:

```shell
[[ -r "/usr/local/etc/profile.d/bash_completion.sh" ]] && . "/usr/local/etc/profile.d/bash_completion.sh"
```

And after much distress, we realized the `BASH_COMPLETION_COMPAT_DIR` variable wasn't being set, and that was needed to load the `git-completion.bash` file as it's home-brew v1. Sunofa.

```shell
export BASH_COMPLETION_COMPAT_DIR="/usr/local/etc/bash_completion.d"
```

### FKNA. Done. Works.



![Homebrew_logo.png](../Homebrew_logo.png)