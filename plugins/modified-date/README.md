# Modified Date Plugin

The **Modified Date** Plugin is for [Grav CMS](http://github.com/getgrav/grav). Displays the last modified date of a page at the bottom of the page content.

## Installation

Installing the Modified Date plugin can be done in one of two ways. The GPM (Grav Package Manager) installation method enables you to quickly and easily install the plugin with a simple terminal command, while the manual method enables you to do so via a zip file.

### Git Installation (Preferred)

The simplest way to install this plugin is via the [Grav Package Manager (GPM)](http://learn.getgrav.org/advanced/grav-gpm) through your system's terminal (also called the command line).  From the root of your Grav install type:

    bin/gpm install modified-date

This will install the Modified Date plugin into your `/user/plugins` directory within Grav. Its files can be found under `/your/site/grav/user/plugins/modified-date`.

### Manual Installation

To install this plugin, just download the zip version of this repository and unzip it under `/your/site/grav/user/plugins`. Then, rename the folder to `modified-date`. You can find these files on [GitHub](https://github.com/fulltrucker/grav-plugin-modified-date).

You should now have all the plugin files under

    /your/site/grav/user/plugins/modified-date

> NOTE: This plugin is a modular component for Grav which requires [Grav](http://github.com/getgrav/grav) and the [Error](https://github.com/getgrav/grav-plugin-error) and [Problems](https://github.com/getgrav/grav-plugin-problems) to operate.

## Configuration

Before configuring this plugin, you should copy the `user/plugins/modified-date/modified-date.yaml` to `user/config/plugins/modified-date.yaml` and only edit that copy.

Here is the default configuration and an explanation of available options:

```yaml
enabled: true
```

Note that if you use the admin plugin, a file with your configuration, and named modified-date.yaml will be saved in the `user/config/plugins/` folder once the configuration is saved in the admin.

## Usage

**Describe how to use the plugin.**

## Credits

**Did you incorporate third-party code? Want to thank somebody?**

## To Do

- [ ] Future plans, if any

