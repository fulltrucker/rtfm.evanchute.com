---
title: 'Rebase Branch From Master'
taxonomy:
  category:
    - docs
routes:
  canonical: /git-your-shit-together/rebase-branch-from-master
---

##Rebasing a Feature Branch from Master (or any branch, really)

This is for when you've been working on a feature branch, and someone else (maybe you) has either been working in a different feature branch that's been merged into the `master` branch, or maybe that someone (who is probably you) just does some work in the `master` branch directly, and essentially you need to get those changes incorporated into your feature branch. 

   - Update your local master first:
      - `git checkout master`
      - `git pull`
   - Switch over to your feature branch and rebase that shit:
         - `git checkout my-cool-branch`
         - `git rebase master`

That's kind of all there is to it. It should be noted that a `rebase` essentially takes everything in the branch that's being brought in, and rearranges the work that you're doing in the receiving feature branch so that it's "on top of" or "after" all the work that had been done in the incoming branch. i.e. it sorta "fast-forwards" the commits in the feature branch that aren't in the incoming (`master`) branch and sticks them at the endow the commit history for that branch.

NB: I use words that probably aren't quite right, but they help me understand what is happening.

TO-DO: figure out the difference between `merge` and `rebase`

