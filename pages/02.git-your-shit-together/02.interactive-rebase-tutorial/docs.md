---
title: 'Interactive Rebase Tutorial'
taxonomy:
    category:
        - docs
---

##Rebasing Cocaine

If there are lots of commits (commit liberally!) you do an Interactive Rebase to clean up your branch history:
   - Make sure you're still in your working branch
   - Start the interactive rebase: `git rebase -i master`
   - A text editor will open, use the following commands:
      - p, pick = use commit
      - r, reword = use commit, but edit the commit message
      - e, edit = use commit, but stop for amending
      - s, squash = use commit, but meld into previous commit
      - f, fixup = like "squash", but discard this commit's log message
      - x, exec = run command (the rest of the line) using shell
      - d, drop = remove commit
   - If dropping commits, reorder the list
   - Ideally, an Interactive Rebase happens BEFORE you git push to the remote repo, but if you've already pushed you can "fix" it by doing a git push --force
   - Tutorial: <https://www.atlassian.com/git/tutorials/merging-vs-rebasing>