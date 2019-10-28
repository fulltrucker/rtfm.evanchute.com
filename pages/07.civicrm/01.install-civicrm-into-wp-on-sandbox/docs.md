---
title: 'Install CiviCRM into WP on Sandbox'
taxonomy:
    category:
        - docs
routes:
  canonical: /civicrm/install-civicrm-into-wp-on-sandbox
---

These are my notes from an installation walk-through by DOB on 5/5/2017 onto the sandbox site for IM4US. This isn’t as much a HOW-TO as it is a starting point… DOB went pretty quickly and I captured as much info as I could.

1. GSL uses the latest code from SourceForge
1. Fire up Terminal and SSH to the client server
1. Fill out the standard dir structure if it’s not there already:
```shell
./
../
conf/
htdocs/
tars/
```
1. DOB has a download script he uses to backup the databases, it’s called SNAP and it’s found in the `~/bin/snap` directory all over the place i.e. other client’s servers
1. Use `wget` to download the latest distro of CiviCRM from SourceForge to the `tars/` directory
1. Go to cPanel to get the correct database user username, password, etc.
1. Use SNAP utility to backup database to dumps
1. Create empty database in cPanel for CiviCRM, based on CMS database name. Example from this instance is:
    - WordPress DB: `soft_wp236`
    - CiviCRM DB: `soft_wp236_civicrm`
1. Usually use different Db user for prod and sandbox environments
1. Same Db user for CMS/CRM on same environment, so add the existing user to the new CiviCRM database
1. Unzip the CiviCRM into the WordPress plugins directory using the CLI. Special note here about difference in WP 4.6 vs. 4.7 directory structure 
1. Activate/enable the CiviCRM plugin in WP Admin
1. Run the CiviCRM installer in WP Admin
    - Make sure to select the CiviCRM DB we created, not the WP CRM database (it defaults to that)
    - Don’t load sample data
1. CiviCRM lives in `/wp-content/uploads` in WP 4.7
1. Sync users to contacts - not sure if this is performed in WP or CiviCRM
1. Do initial setup/config checklist - use client manifest if needed

**✪ There is a good step-by-step guide in the CiviCRM Wiki for installing and upgrading**

- DOB suggests I pull an old version of CiviCRM and install it somewhere to practice, both Drupal and WordPress versions
- Also do an upgrade, that’s where shit gets hairballs

**✪ At some point there needs to be a `my.cnf` file added to the server, somewhere!**