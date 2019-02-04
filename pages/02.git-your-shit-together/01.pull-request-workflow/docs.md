---
title: 'Git Pull Request Workflow'
taxonomy:
    category:
        - docs
---

##The Basic Gist of the Thing

1. To see where the origin of a git repo is, navigate to the directory on the server where the repo is cloned and do: `git remote -v`
1. Determine what branch you’re currently working on...
   - Show only current branch: `git branch`
   - Show all remote branches: `git branch -r`
   - Show all local and remote branches: `git branch -a`
1. If you're on the branch you want to be working on, get the latest: git fetch
1. If asked for a password, the repo is likely configured with https and should be set up ssh to change do: `nano .git/config`
1. If you need to update your working copy do: git pull
1. Switch to the branch you wish to work on:
   - Checkout an existing branch: `git checkout branchname`
   - Create a new branch for your work using `git checkout -b branchname` (name it with the issue number)
   - If you had to create a branch, make sure the new branch is "created" in the remote repo (i.e. BitBucket) by doing:  `git push -u origin branchname` 
   - Everything after that can just use git push to send stuff to this branch, unless you change branches of course
1. Do your changes to the files now. Aw yeah.
1. When done making changes, ready a commit:
   - To see what files have changed:  `git status`
   - To add files to your commit:  `git add filename filename filename`
   - To add all files to your commit (use with caution):  `git add .`
   - Commit the files:  `git commit -m "[descriptive message]"`
1. Repeat steps 5-6 as needed to complete the work. Commit liberally, which is akin to saving early and often. This is version control, changes can be rolled back if needed.
1. If there are lots of commits (commit liberally!) you do an [Interactive Rebase](/git-your-shit-together/interactive-rebase-tutorial) to clean up your branch history.
1. Push the changes up to remote:  `git push`
1. Create a Pull Request using the GitHub or BitBucket GUI
1. Success!

##Need to work on two things?

If working on two different tickets for the same client, create multiple branches for each set of work. This will mean checking out (i.e. switching back to) the master branch after you complete one ticket, and creating a new branch from master for the next bit of work on a different ticket.

Do 2 PRs for the 2 issues

##LOL Wut?

Check config file for send mail to log everywhere