const mix = require('laravel-mix');
const { readdirSync, statSync } = require('fs');
const { join } = require('path');

require('dotenv').config();

const dir = p => {
  const dirs = readdirSync(p).filter(f => statSync(join(p, f)).isDirectory())
  return dirs.length ? dirs[0] : '';
};

const theme = process.env.WP_THEME ? process.env.WP_THEME : dir('web/app/themes');

mix.setResourceRoot('../');
mix.setPublicPath(`web/app/themes/${theme}/assets`);

mix.js('resources/scripts/app.js', 'scripts');
mix.sass('resources/styles/app.scss', 'styles');

mix.version();
