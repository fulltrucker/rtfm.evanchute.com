# Modified Date Plugin

The **Modified Date** Plugin is for [Grav CMS](http://github.com/getgrav/grav). Displays the last modified date of a page at the bottom of the page content.

## Installation

Installing the Modified Date plugin can be done in one of two ways, either on the command line from [GitHub](https://github.com/fulltrucker/modified-date) or manually by downloading the .zip version of the plugin.

### Git Installation (Preferred)

The simplest way to install this plugin is via Git on the command line.  In the `/user/plugins` directory your Grav install type:

```shell
$ git clone https://github.com/fulltrucker/modified-date.git
```

This will clone the Modified Date plugin into your `/user/plugins` directory within Grav. Its files can be found under `/your/site/grav/user/plugins/modified-date`.

### Manual Installation

To install this plugin, just download the zip version of this repository and unzip it under `/your/site/grav/user/plugins`. Then, rename the folder to `modified-date`. You can find these files on [GitHub](https://github.com/fulltrucker/modified-date).

You should now have all the plugin files under

    /your/site/grav/user/plugins/modified-date

> NOTE: This plugin is a modular component for Grav which requires [Grav](http://github.com/getgrav/grav) and the [Error](https://github.com/getgrav/grav-plugin-error) and [Problems](https://github.com/getgrav/grav-plugin-problems) to operate.

## Configuration

Before configuring this plugin, you should copy the `user/plugins/modified-date/modified-date.yaml` to `user/config/plugins/modified-date.yaml` and only edit that copy.

Here is the default configuration and an explanation of available options:

```yaml
enabled: true
pretext: The text that is displayed before the last modified date. Simple text field, can accept Twig and Markdown.
placement: Whether you want to display the modified date at the top or the bottom of the content
  options:
    - top
    - bottom
page_types: The page templates (types) on which to display the modified date
  options:
    - default
    - docs
    - chapter
```

Note that if you use the admin plugin, a file with your configuration, and named modified-date.yaml will be saved in the `user/config/plugins/` folder once the configuration is saved in the admin.

## Usage

This plugin requires Twig processing to operate, so you'll need to enable that in `user/config/system.yaml` for the plugin to work. Like so:

```yaml
  events:
    page: true
    twig: true
```

Right now the page types are hard-coded to the templates in the Learn2 theme. Ideally, the list of page types would be generated dynamically from the theme. But for now, select which of the three types of pages you want the modified date to appear on using the options detailed in the Configuration section.

## To Do

- ~~Generate page types / templates dynamically from the theme.~~
- Move the page type check login from `onPageContentRaw()` to `onPluginsInitialized()` so it just doesn't even fire if we're not on the right page. Maybe even replace the `isAdmin()` check.
- Figure out how to use a `template` file to append/prepend to the page content, rather than munging the entire content. This would seem cleaner.

