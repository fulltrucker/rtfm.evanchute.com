---
title: 'Adding SSH Public Key'
taxonomy:
    category:
        - docs
routes:
  canonical: /ssh-and-terminal/adding-ssh-public-key
---

This guide walks through how to add a public key to a Siteground hosted website, then setting up passwordless login via SSH/Terminal and Transmit on a Mac.

## Generating an SSH Key Pair

1. Open Terminal
1. Check for an existing key pair by doing: `ls -al ~/.ssh`
1. Paste the text below, substituting in your email address:
   `ssh-keygen -t rsa -b 4096 -C` _email@example.com_
1. This creates a new ssh key, using the provided email as a label
   Generating public/private rsa key pair.
1. When you're prompted to "Enter a file in which to save the key," press Enter. This accepts the default file location.
   ```shell
   Enter a file in which to save the key (/Users/*you*/.ssh/id_rsa): *[Press enter]*
   ```
1. At the prompt, type a secure passphrase if applicable:
   ```
   Enter passphrase (empty for no passphrase): *[Type a passphrase]*
   ```
   ```
   Enter same passphrase again: *[Type passphrase again]*
   ```
1. Copy the SSH key to your clipboard by doing a `pbcopy < ~/.ssh/id_rsa.pub`. If your SSH key file has a different name than the example code, modify the filename to match your current setup. When copying your key, don't add any newlines or whitespace.

**Helpful Links:**

- https://help.github.com/articles/checking-for-existing-ssh-keys/
- https://help.github.com/articles/generating-a-new-ssh-key-and-adding-it-to-the-ssh-agent/
- https://www.siteground.com/kb/How_to_generate_an_SSH_key_pair_in_Mac_OS/

## Add public key to Siteground website

1. Find the Siteground login UN/PW in the GSL LastPass Shared Folder
1. Login to Siteground with the client’s credentials
1. Click over to the “My Account” tab
1. Click the red “Go to cPanel” button
1. Click the SSH/Shell Access icon under Advanced
1. Paste the staff member’s public key into the “Upload SSH key” box
1. Click the upload button

**Helpful Links:**

- https://www.siteground.com/tutorials/ssh/ssh_cpanel.htm

## Add login to .ssh config file

1. OpenTerminal and do a: `nano ~/.ssh/config`
1. The config file should already have some defaults in it that look like:
   ```shell
   Host *
     Compression yes
     IdentityFile ~/.ssh/id_rsa
   ```
1. Template for what to add to the config file:
   ```shell
   Host shortcutname
     HostName server.domain.com
     Port 5555
     User username
   ```
1. Notes:
   - Host shortcutname should be something that makes sense for the client/server
   - Hostname, Port, and User should come from the host provider
1. Hit control-X to exit the editor, follow onscreen prompts to save the file
1. Do a `cat ~/.ssh/config` to make sure changes were made

**Helpful Links:**

- http://osxdaily.com/2011/04/05/setup-ssh-config-fie/
- http://nerderati.com/2011/03/17/simplify-your-life-with-an-ssh-config-file/

## Add login to Transmit FTP Client

To-Do, but also pretty straight-forward

## Add login to Sequel Pro

1. Use a “Standard” connection — SSH connection won’t work and isn’t needed
1. On a Siteground server you'll need to add your public IP address to the Remote Database Access Hosts list in cPanel, found in the Databases section.
   - Use the server's secondary IP address in Sequel Pro which should be listed on the Remote Database Access Hosts page
   - Username and PW for each DB user will grant access to whatever databases that user has access to. Entering a database name here will only make that the default, leave blank to not have a default
   - Port: 3306

## Add remote server to Macfusion using SSHFS

I don't use this often, or really ever. These days it's all about using the [Coda 2 IDE](https://panic.com/coda/) to connect to a remote server (SSH supported!) and work either locally or straight on the server, depending on what I'm doing. Nearly everything is kept in version control, as well. But I'll leave these here for posterior.

1. Open up Macfusion
1. Click the ‘+’ icon and choose SSHFS
1. Add Host and Username in the SSH tab, Password and Path can be blank
1. Add the port in the SSH Advanced tab, other fields are fine as default
1. Enter the client key in all caps in the Volume Name field on the Macfusion tab
1. Click Okay
1. Mount!

