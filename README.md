# 10up Experience Plugin

> The 10up Experience plugin configures WordPress to better protect and inform our clients, aligned to 10up’s best practices. It is not meant as a general-distribution plugin and does not have an open development process, but is available for public perusal.

[![Build Status](https://travis-ci.org/10up/10up-experience.svg?branch=master)](https://travis-ci.org/10up/10up-experience) [![Support Level](https://img.shields.io/badge/support-active-green.svg)](#support-level) [![Release Version](https://img.shields.io/github/v/tag/10up/10up-experience?label=release)](https://github.com/10up/10up-experience/tags) ![WordPress tested up to version](https://img.shields.io/badge/WordPress-v5.9%20tested-success.svg) [![GPLv2 License](https://img.shields.io/github/license/10up/10up-experience.svg)](https://github.com/10up/10up-experience/blob/develop/LICENSE.md)

## Requirements

* PHP 5.3+
* [WordPress](http://wordpress.org) 4.7+

## Installation

### Composer

The recommended way to use this plugin is with Composer.

```
composer require 10up/10up-experience
```

### Git
For development purposes, you can clone the plugin into `wp-content/plugins` and install the dependencies.

```
git clone git@github.com:10up/10up-experience.git && cd 10up-experience && composer install && npm install
```

### Archive
If you need a built version of the plugin to install via the dashboard, [download](https://github.com/10up/10up-experience/archive/master.zip) and extract the plugin into `wp-content/plugins`. Make sure you use the `master` branch which contains the latest stable release.
## Activation

Activate the plugin via the dashboard or WP-CLI.

```
wp plugin activate 10up-experience
```

## Updates

Updates use the built-in WordPress update system to pull from GitHub releases.

## Functionality

* __REST API__

  Adds an option to general settings to restrict REST API access. The options are: show REST API to everyone, only show REST API to logged in users, and show REST API to everyone except `/users` endpoint. By default, the plugin requires authentication for the `/users` endpoint.

	*Configured in `Settings > Reading`.*

* __Authors__

  Removes 10up user author archives so they aren't mistakenly indexed by search engines.

* __Gutenberg__

  Adds an option in writing to switch back to Classic Editor.

	*Configured in `Settings > Writing`.*

* __Plugins__

  Adds a 10up Suggested Plugins section to the plugins screen. Warns users who attempt to deactivate the 10up Experience plugin. Outputs a notice on non-suggested plugins tabs warning users from installing non-approved plugins. If `DISALLOW_FILE_MODS` is on, update notices will be shown in the plugins table.

* __Post Passwords__

  Password protecting post functionality is removed both in Gutenberg and the classic editor. This can be disabled in the writing section of the admin.

	*Configured in `Settings > Writing`.*

* __Support Monitor__

  Sends non-PII information about the website back to 10up including plugins installed, constants defined in `wp-config.php`, 10up user accounts, and more.

	*Configured in `Settings > General` or `Settings > Network Settings` if network activated.*

* __Authentication__

  By default, all users must use a medium or greater strength password. This can be turned off in general settings (or network settings if network activated). Reserved usernames such as `admin` are prevented from being used.

	*Configured in `Settings > General` or `Settings > Network Settings` if network activated.*

  **Password strength functionality requires the PHP extension [mbstring](https://www.php.net/manual/en/mbstring.installation.php) to be installed on the web server. Functionality will be bypassed if extension not installed.*


* __Headers__

  `X-Frame-Origins` is set to `sameorigin` to prevent click jacking.

*Note:* 10up admin branding can be disabled by defining the constant `TENUP_DISABLE_BRANDING` as `true`.

There are 2 filters available here:
- `tenup_experience_x_frame_options` - (default value) `SAMEORIGIN` can be changed to `DENY`.
- `tenup_experience_disable_x_frame_options` - (default value) `FALSE` can be changed to `TRUE` - doing so will omit the header.

* __SSO__

10up Experience includes 10up SSO functionality. There are some useful constants related to this functionality:

- `TENUPSSO_DISABLE` - Define this as `true` to disable SSO.
- `TENUPSSO_DISALLOW_ALL_DIRECT_LOGIN` - Define this as `true` to disable username/password log ins completely.

## Support Level

**Active:** 10up is actively working on this, and we expect to continue work for the foreseeable future including keeping tested up to the most recent version of WordPress.  Bug reports, feature requests, questions, and pull requests are welcome.

## Changelog

A complete listing of all notable changes to the 10up Experience Plugin are documented in [CHANGELOG.md](https://github.com/10up/10up-experience/blob/develop/CHANGELOG.md).

## Like what you see?

<p align="center">
<a href="http://10up.com/contact/"><img src="https://10up.com/uploads/2016/10/10up-Github-Banner.png" width="850"></a>
</p>
