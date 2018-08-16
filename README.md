# Base

> Standard WordPress layout for Elli & Friends projects.

## Setup instructions

```
composer create-project ellifriends/wp-boilerplate
```

## Structure

```
| config    - WordPress and environment configurations
| public    - Web root and WordPress content directory
| resources - CSS and JavaScript pre-processors using Laravel Mix
```

## Configuration

Modify environment configuration in `.env` after your need. It's important to set `WP_THEME` variable to your theme directory name so Laravel mix builds works.

## Documentations

- [WordPress theme handbook](https://developer.wordpress.org/themes/)
- [WordPress plugin handbook](https://developer.wordpress.org/plugins/)
