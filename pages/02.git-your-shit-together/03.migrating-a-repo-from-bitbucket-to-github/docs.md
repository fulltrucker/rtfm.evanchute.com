---
title: 'Migrating a repo from BitBucket to GitHub'
taxonomy:
    category:
        - docs
---

Some (a lot) of this is Ginkgo Street specific, but it does have some valuable generic info and concept oriented stuff.

[Instructions for managing user access](https://docs.google.com/document/d/1m6Ucr4vvrAWtOrtO-mxGDvgE7dtlp_09VEGuBEurvsU/edit#heading=h.kfb3lgnwfdic)

## Teams

- There is still some uncertainty about how we will use teams.
- I think we will use them on a per-client (not project) basis.
- So, before migrating or creating new repos, create a team for the client using the client-key (e.g. BACT).
- We can then manage access to the repos by adding members to the team.
- Other teams can also be added to teams, for instance if we have a contractor who has multiple developers it may be handy to create a team for that contractor (e.g. create a Tadpole team) and then add the contractor-team to the client-team for access.

## The Basic Idea™

#### Prep:

Think about whether or not to change the repo name/url. Since the URL is definitely changing, now is the best time to change the repo name to something meaningful. Prefixing with a client-key is not necessarily preferable, but it is one option to consider for renaming.

#### Steps:

1. Log into BitBucket and find the repo (good luck!)
1. Go to the repo settings and set the repo to public
1. Alternatively you can leave the BitBucket repo private and just "log in" to BitBucket in step #5 below
1. Get the clone URL by clicking the Clone button in the upper-right of the BitBucket repo
1. Go to GitHub and find "import" on the plus-icon in the upper-right corner
1. There should be an "Import from URL" option, use that
1. Confirm that shit worked
1. Delete the BitBucket repo
1. Update the remote config of any known/shared clones with the new URL and do a git fetch. This can be accomplished in one of three ways:
  - Edit the URL in the .git/config file 
  - Remove and re-add the remote, usually the origin:
    - git remote remove origin
    - git remote add origin <url>
  - Do a git remote set-url origin <URL> (this might be the easiest/cleanest way, see the [documentation here](https://help.github.com/articles/changing-a-remote-s-url/))