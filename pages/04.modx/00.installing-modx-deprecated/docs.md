---
title: 'Installing MODX (deprecated)'
menu: 'Installing MODX (deprecated)'
taxonomy:
    category:
        - docs
routes:
  canonical: /modx/installing-modx-deprecated
---

This is a mostly deprecated version of how to install MODX on a server. There are still likely some good things in here, such as base configs and extras and whatnot.

## Core Installation

1. Create domain or subdomain on server (if hosted with Orange)
     * Make sure PHP Safe Mode is OFF
     * Create mySQL database
     * Add DB name/UN/PW to appropriate master list
1. Upload ‘loaded’ _MODxOsk .zip file to server with Transmit
1. Fire up a new remote connection in Terminal and get after it:
     * UN: ssh root@67.222.24.160 -p2200 (Orange server)
     * PW: c35tlav13
     * Change to the domains directory: cd ../var/www/vhosts/
     * List the directory contents: ls -alh
          * Change to the domain’s http dir: cd [domain.com/httpdocs](http://domain.com/httpdocs)
          * Might need to navigate to the subdomain http dir
          * Basically, find the .zip file
     * Unzip the package: unzip _MODxOsk-2.2.0-pl2_v1.0.zip
     * List dir contents to make sure it worked: ls -alh
     * Double check in Transmit (optional)
     * Delete unwanted/unneeded files:
          * rm -f _MODxOsk-2.2.0-pl2_v1.0.zip
          * rm -rf __MACOSX
          * Removing DS_Store files (if present)
              * find ./ -name .DS_Store -print
              * Copy this list, paste into a text editor, and remove all the line breaks.
              * rm -f [insert list of files here]
              * find ./ -name .DS_Store -print
              * rm -rf [insert folder name here] if you need to remove folders
     * Change ownership of all files: chown -Rv [username] *
     * Change group on all files: chgrp -Rv psacln *
     * Done with Terminal, close that bitch down
1. Set directory and file permissions in Transmit:
     * assets/ = 755
     * assets/components = 755
     * assets/files = 755
     * assets/images = 755
     * core/ = 755
     * core/cache = 755
     * core/components = 755
     * core/export = 755
     * core/packages = 755
     * core/config/config.inc.php = 777
1. Rename ht.access to .htaccess
1. Run installer at [http://www.domain.com/setup](http://www.domain.com/setup)
1. **SUCCESS!**
     * Set file permissions of core/config/config.inc.php = 444
     * Delete Setup directory from /httpdocs/
     * Uncomment Friendly URLs stuff in .htaccess
     * Uncomment Canonical stuff in .htaccess
     * make sure all URL’s are correct for the domain in .htaccess
     * Login to that bitch

## System > Package Management

1. Go to Package Management and Search Locally for Packages (or download the and install following)
     * Analytics
     * Big Brother
     * BreadCrumb *<--note this is singular!*
     * Captcha
     * Copyright
     * FormIt
     * getPage
     * getResources
     * GoogleSiteMap
     * MIGX
     * ObfuscateEmail-Revo
     * phpThumbsUp
     * SimpleSearch
     * sitemapFriend
     * TinyMCE
     * UltimateParent
     * Wayfinder
1. INSTALL ALL THE THINGS!

## System > System Settings

1. Filter by area... Site:
     * Published Default: Yes
     * Site name: [site name]
     * Default Template: whatever you want it to be (or leave this as is, then rename BaseTemplate to the most used template in the site)
1. Filter by area... Friendly URL
     * Automatically generate alias: Yes
     * Container Suffix: .html
     * Use Friendly URLs: Yes
     * Use Friendly Alias Path: set to ‘Yes’ if you want full path URLs
1. Filter by area... System and Server
     * Default Time Zone: America/Denver (this might be optional)
1. Filter by area... Rich-Text Editor
     * editor_css_path: /assets/site/css/user_access.css
1. Filter by area... Back-end Manager
     * resource_tree_node_tooltip: longtitle
1. Namespace Dropdown > tinymce
     * add 'table,spellchecker,autolink' to tiny.custom_plugins
     * set tiny.custom_buttons1 to: undo,redo,selectall,separator,pastetext,pasteword,separator,search,replace,separator,nonbreaking,hr,charmap,separator,image,modxlink,unlink,anchor,media,separator,cleanup,removeformat,separator,fullscreen,print,code,help
     * set tiny.custom_buttons2 to: bold,italic,underline,strikethrough,sub,sup,separator,bullist,numlist,outdent,indent,blockquote,separator,justifyleft,justifycenter,justifyright,justifyfull,separator,forecolor,backcolor,styleprops
     * set tiny.custom_buttons3 to: tablecontrols,separator,styleselect,formatselect,spellchecker
     * Set TinyMCE Document Base URL to ‘/’
     * Set tiny.path_options to rootrelative

## Security > Forms Customization

1. Create New Profile
     * Name: META Tags
     * Description: Renames a few of the Manager forms to be consistent with how META tags are named
     * Create New “resource/create” Set, name it and Save it
     * Edit the set by right-clicking it and entering the following:
         * longtitle = META Page Title
         * description = META Description
         * introtext = META Keywords
     * Duplicate and change to a “resource/update” set
1. Bitch about how as cool as this is, it’s maybe a little moar tedious than ManagerManager was in Evo

## Security > Access Controls

1. Access Policies
     * Duplicate Content Editor
         * Name: Content Administrator
         * Description: Context administration policy with limited, content-editing related Permissions, but with publishing and component access.
         * Check the following:
             * change_password
             * components
             * directory_create
             * directory_list
             * directory_remove
             * directory_update
             * edit_tv
             * empty_cache
             * file_create
             * file_list
             * file_manager
             * file_remove
             * file_tree
             * file_update
             * file_upload
             * publish_document
             * save_tv
             * source_delete
             * source_edit
             * source_save
             * unpublish_document
             * view_tv
             * view_unpublished
1. Create New User Group (for client access, limits them to content admin)
     * Name: Content Manager
     * Context Access
         * web: Member, Content Administrator
         * mgr: Member, Content Administrator
     * Media Source Access
         * Source: Files
         * Minimum Role: Member
         * Access Policy: Media Source Admin
     * Repeat this for the Images Media Source

## Tools > Media Sources

1. Create New Media Source
     * Source Type: File System
     * Name: Files
     * Description: Only shows the Files folder (if present), for use on Content Managers
     * set basePath Value to ‘assets/files/’
     * set baseUrl Value to ‘assets/files/’
     * Access Permissions, add
         * Content Manager and Administrator
         * Member - 9999
         * Media Source Admin
1. Create New Media Source
     * Source Type: File System
     * Name: Images
     * Description: Only shows the Images folder, for use on Content Managers
     * set basePath Value to ‘assets/images/’
     * set baseUrl Value to ‘assets/images/’
     * Access Permissions, add
         * Content Manager and Administrator
         * Member - 9999
         * Media Source Admin
1. Update Media Source: Filesystem
     * Description: Shows entire file tree, for Admin users only
     * Access Permissions > Add User Group
     * User Group: Administrator
     * Minimum Role: Member - 9999
     * Policy: Media Source Admin
1. From the top menu:
     * Site > Clear Cache
     * Security > Flush Permissions
     * Security > Flush All Sessions 
     * re-login to the Manager. 

## Configure Common Base Pages

1. Add the following base pages to the site:
     * sitemap.xml
     * sitemap.html
     * robots.txt
     * privacy-policy.html
     * terms.html
     * Email Contact Form
         * contact.html
         * Contact Form Content (if using SPForm)
         * thankyou.html

## Obfuscate Email Addresses

1. Set up basic user_access.css with Email Obfuscate JavaScript (deprecated for MODX Extra that does this)

