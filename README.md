Original README is here: [pages/01.rtfm/docs.md](pages/01.rtfm/docs.md) and may be more upper to dater.

## LOL Wut?

Because ain't nobody got time to remember e'ery gotdammed thing. This is a collection of HOW-TOs and other whatnot I've collected over time. Installing a CMS on the command line, common Git workflows, and whatever else I can think of. Most of The Manual™ is categorized, but there might be some random stuff in this section as well. You'll figure it out, and if not: that's what the search bar is for.

![LOLWUT](pages/01.rtfm/LOL-WUT.jpg?resize=400)

## Chachi Loves Changes

The Manual™ is made with [Grav CMS](https://getgrav.org/), stored in a [GitHub repository](https://github.com/fulltrucker/rtfm.evanchute.com), and edited in [Typora](https://typora.io/) using [Markdown](pages/09.random/99.simple-markdown-guide/docs.md). ~~Okay, it's not actually stored in GitHub at the moe, but it'll be stored there or in BitBucket eventually.~~ Mainly this site is for to learn a bit about Grav, and syncing with a Git repo is one of the things on my list.

![Joni loves Chachi](pages/01.rtfm/joanie-loves-chachi.jpg?resize=400)

To make changes, my current plan is to edit the site files locally using Typora or Coda, depending on what I'm doing, then push to the repo which will automagically update the live site. To this end, I've turned auto-syn OFF on the [GitSync Plugin](https://github.com/trilbymedia/grav-plugin-git-sync), which prevents the repo from getting updated if I change something in Grav's admin interface. This is the way I think I'll prefer to work, as it will allow me to make a lot of changes locally (even in the Grav admin!) and then `git push` when everything is in order. It also means I should ALWAYS work locally, pushing commits up to the repo. The repo is set up with a webhook that automagically updates the live site when a commit is pushed to the GitHub repo... effectively making the live site a one-way sync. 

Also right now, I'm the only one maintaining this Bad Larry, but who knows what will happen in the future. Future Me might need help.

## Who dat ninja?

This guide is collaboratively written, edited, and curated by My Own Damn Self™.

![Sunglasseses](pages/01.rtfm/sunglasses-sunglasses.gif)
