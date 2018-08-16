# Boilerplate

> Standard WordPress layout for Elli & Friends projects.

## Setup instructions

```
composer create-project ellifriends/wp-boilerplate
```

## Structure

```
| config    - WordPress and environment configurations
| public    - Web root and WordPress content directory
  | - 
| resources - CSS and JavaScript pre-processors using Laravel Mix
```

## Configuration

Modify environment configuration in `.env` after your need. It's important to set `WP_THEME` variable to your theme directory name so Laravel mix builds works.

## Multisite URL fixer

[Roots](https://roots.io/) [multisite-url-fixer](https://github.com/roots/multisite-url-fixer) mu-plugin on subdomain installs to make sure admin URLs function properly. That plugin is not needed on subdirectory installs, but will work well with them.

Run `composer require roots/multisite-url-fixer` to install the package. It will automatically install as an mu-plugin thanks to the mu-plugins autoloader.

## Documentations

- [WordPress theme handbook](https://developer.wordpress.org/themes/)
- [WordPress plugin handbook](https://developer.wordpress.org/plugins/)
