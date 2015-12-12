# How to work

All files for production are compiled with [Grunt]. CSS compiled with [PostCSS]. Images and HTML just copied.

## Setup

1. Install [Node.js].
2. Install [Grunt] CLI:

		$ npm install -g grunt-cli

3. Install development modules:

		$ npm install

4. Run `grunt build`.

## Folders structure

`root` — configs and dependencies.

`build` — destination directory. There would be generated assets. Shouldn't be in repository.

`dev` — source directory for everything:

* dev root — HTML.
* `img` — images.
* `pcss` — PostCSS files.

## Generate assets

Start watching service which generates _dev_ version on each source file change, also this start local webserver with autoreload:

	$ grunt

Generate _production_ (minified and optimized) version:

	$ grunt build

## Other Grunt-tasks

**test** — check JavaScript code style in scripts.js and Gruntfile.js.

**deploy** — upload files to the server.

[Grunt]: http://gruntjs.com/
[PostCSS]: https://github.com/postcss/postcss/
[Node.js]: https://nodejs.org/
