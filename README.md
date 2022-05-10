# CECS Department Theme

This is a basic child theme built for CECS Departments. The theme comes with the following layouts/features:

* `newsroom` Post List layout
* `faculty` CPT
* `faculty` Post List layout
* `directory` Post List layout
* Sidebar theme settings page and ACF field
* Sidebar Selector page ACF field

The Sidebar Selector checkbox options are dynamically generated with the `acf_load_sidebar_field_choices` filter to add in all sidebars entered in the Theme Settings > Sidebar page.

Built as a child theme of the [UCF WordPress Theme](https://github.com/UCF/UCF-WordPress-Theme), using the [Athena Framework](https://ucf.github.io/Athena-Framework/).

## Quick links

* [**Theme Documentation**](https://github.com/UCF-CECS-IT/UCF-CECS-Department-Theme/wiki)
* [Development](#development)
* [Contributing](#contributing)

-----

## Documentation

Head over to the [CECS Department Theme wiki](https://github.com/UCF-CECS-IT/UCF-CECS-Department-Theme/wiki) for detailed information about this theme, installation instructions, and more.

-----

## Development

Note that compiled, minified css and js files are included within the repo.  Changes to these files should be tracked via git (so that users installing the theme using traditional installation methods will have a working theme out-of-the-box.)

[Enabling debug mode](https://codex.wordpress.org/Debugging_in_WordPress) in your `wp-config.php` file is recommended during development to help catch warnings and bugs.

### Requirements
* node v16+
* gulp-cli

### Instructions
1. Clone the UCF-CECS-Department-Theme repo into your local development environment, within your WordPress installation's `themes/` directory: `git clone https://github.com/UCF-CECS-IT/UCF-CECS-Department-Theme.git`
2. `cd` into the new UCF-CECS-Department-Theme directory, and run `npm install` to install required packages for development into `node_modules/` within the repo
3. Optional: If you'd like to enable [BrowserSync](https://browsersync.io) for local development, or make other changes to this project's default gulp configuration, copy `gulp-config.template.json`, make any desired changes, and save as `gulp-config.json`.

    To enable BrowserSync, set `sync` to `true` and assign `syncTarget` the base URL of a site on your local WordPress instance that will use this theme, such as `http://localhost/wordpress/my-site/`.  Your `syncTarget` value will vary depending on your local host setup.

    The full list of modifiable config values can be viewed in `gulpfile.js` (see `config` variable).
3. Run `gulp default` to process front-end assets.
4. If you haven't already done so, create a new WordPress site on your development environment, and [install and activate theme dependencies](https://github.com/CECS-IT/UCF-CECS-Department-Theme/wiki/Installation#installation-requirements).
5. Set CECS Department Theme as the active theme.
6. Make sure you've completed [all theme configuration steps](https://github.com/CECS-IT/UCF-CECS-Department-Theme/wiki/Installation#theme-configuration).
7. Run `gulp watch` to continuously watch changes to scss and js files.  If you enabled BrowserSync in `gulp-config.json`, it will also reload your browser when scss or js files change.


## Contributing

Want to submit a bug report or feature request?  Check out our [contributing guidelines](https://github.com/UCF-CECS-IT/UCF-CECS-Department-Theme/blob/master/CONTRIBUTING.md) for more information.  We'd love to hear from you!
