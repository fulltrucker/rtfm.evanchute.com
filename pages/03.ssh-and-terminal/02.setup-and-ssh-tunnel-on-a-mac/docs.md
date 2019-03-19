---
title: 'Setup an SSH Tunnel on a Mac'
taxonomy:
    category:
        - docs
---

If a client is restricting access to their website by IP, you may need to set up an SSH Tunnel through which to direct all your web traffic, in order to gain a stable static IP address that is whitelisted on the client website. We can use the Ginkgo Street Labs electrode server to do this fairly easily, or probably evanchute.com if we are no longer working with Ginkgo Street.

## Whitelist Electrode's IP Address on the client server

1. Make sure the client server has electrode's IP Whitelisted: 
1. The whitelist might be found in on the client's server in a number of places:
    * `/etc/apache2/conf-enabled/ip-restrictions.conf`
    * `/etc/apache2/sites-enabled/`
    * `/etc/apache2/sites-available/`
1. Use `sudo nano` to edit the whitelist
1. Add Electrode's IP address to this file: `Allow from 66.228.54.97`
1. You might need to do a `sudo service apache2` reload after adding the IP to the whitelist

## Opening an SSH Tunnel in Terminal

1. Open a terminal window and do a: `ssh -D 8080 -C -q -N echute@electrode.ginkgostreet.com -p 32121`
   - The terminal should go to a new line and just display a blinking cursor, this is normal
   - See [this ExplainShell link](https://explainshell.com/explain?cmd=ssh+-D+8080+-C+-q+-N+username%40electrode.ginkgostreet.com+-p+32121) for what's going on here
   - You can add the -f option to start the tunnel in the background, to kill it use step #5 below
1. Viola, nothing more to it. The tunnel is now open, though you will need to configure your Mac to use this tunnel to serve web traffic via a SOCKS proxy ([see below](https://docs.google.com/document/d/124u6zVfYhYqz-a_obaywSsGCmv4gjDQv4j6AVL9qO7s/edit#heading=h.qdrfr2cyto5))
1. NB: it is believed that web traffic will not work using this method until you configure the SOCKS Proxy
1. To terminate this tunnel connection, go back to the Terminal window where the connection is running and simply do a `ctrl`-C to quit the connection.
1. To check that the connection is closed, or if you lose the window with the connection running, you can do a `ps -A | grep ssh` to see if it's going. Then you can do a `kill ####` for whatever process number it is to stop it.

## Opening an SSH Tunnel using SSH Tunnel Manager (Mac)

1. Open SSH Tunnel manager app
1. Open the preferences
1. Configure it similarly to the Terminal method above, except using the nifty point-and-click GUI. Example: ![img](https://lh6.googleusercontent.com/9KGj3OC7UDyUBauzDMa_4M_Qonkb5ncJKrqhiDCbzjiyYZBKb19MgndP8dPBfpoVNz9L4AnTT2IKo8LLGQYPXa6wH3EJB2aPb6AFGXUjNSQJ6UNLIRYmzIJiPI4bJgwDDMxOjVcv)
1. When done, close the preferences panel, and click the "Start" button from the Connections window
1. Like the Terminal method above, you can do a `ps -A | grep ssh` in a Terminal window to see if this is running.
1. This method will allow web connection without SOCKS Proxy configured, but to run your connection through the static IP of this tunnel you'll need to configure that bad larry.

## Configuring your Mac to use a SOCKS Proxy

1. Go to System Preferences > Network
1. Click the "Advanced..." button in the lower right, just above the "Apply" button
1. Go to the Proxies tab
1. Check the box for SOCKS Proxy
1. Enter `localhost` and `8080` for the SOCKS Proxy Server
1. Click Okay
1. Click Apply
1. You can also set up a new "Location" with these settings, to make it easy-ish to switch back and forth from using a SOCKS Proxy Server and regular settings

![img](https://lh6.googleusercontent.com/s9fKBoAJCgTfS70LDrBh6VREAkdQ0RSokAN-wZ6TZHOmAyIbRBoCtIRfo3XmHYove8F4ttExKqYxcww2ZM_72hpujK5fJYMDC8xWrAer59K1NKNvuTehZl5HzPDhK78szdVwvAYg)