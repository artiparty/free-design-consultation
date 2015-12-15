module.exports = function(grunt) {
	grunt.initConfig({

		project: {
			src: 'dev',
			build: 'build',
			css: {
				src: 'dev/pcss/main.pcss',
				build: 'build/main.css',
				dir: 'dev/pcss/'
			},
			img: {
				src: 'dev/img',
				build: 'build/img',
				allExtensions: '**/*.{png,jpg,gif,svg}'
			}
		},
		pkg: grunt.file.readJSON('package.json'),

		postcss: {
			options: {
				map: false,
				processors: [
					require('postcss-import')(),
					require('postcss-mixins')(),
					require('postcss-nested')(),
					require('postcss-simple-vars')(),
					require('postcss-property-lookup')(),
					require('postcss-assets')({
						basePath: 'dev'
					}),
					require('postcss-calc')(),
					require('postcss-hexrgba')(),
					require('postcss-custom-media')(),
					require('postcss-media-minmax')(),
					require('autoprefixer')({
						browsers: ['last 2 versions', '> 1%', 'Android >= 4', 'iOS >= 8']
					})
				]
			},
			default: {
				src: '<%= project.css.src %>',
				dest: '<%= project.css.build %>'
			},
			minify: {
				options: {
					map: false,
					processors: [
						require('cssnano')({
							autoprefixer: false,
							calc: false,
							colormin: true,
							convertValues: false,
							discardComments: true,
							discardDuplicates: true,
							discardEmpty: true,
							discardUnused: true,
							mergeIdents: true,
							mergeLonghand: true,
							mergeRules: false,
							minifyFontValues: true,
							minifyGradients: true,
							minifySelectors: true,
							normalizeCharset: true,
							normalizeUrl: false,
							orderedValues: false,
							reduceIdents: true,
							uniqueSelectors: true,
							zindex: true
						})
					]
				},
				src: '<%= project.css.build %>'
			}
		},

		usebanner: {
			default: {
				options: {
					position: 'top',
					banner: '/*\n' +
							'Author:     Aleks Hudochenkov (hudochenkov.com)\n' +
							'Version:    <%= grunt.template.today("dd.mm.yyyy") %>\n' +
							'-----------------------------------------------------------------------------*/\n'
				},
				files: {
					src: ['<%= project.css.build %>']
				}
			}
		},

		clean: {
			build: [
				'<%= project.build %>'
			],
			options: {
				force: true
			}
		},

		copy: {
			images: {
				files: [
					{
						expand: true,
						cwd: '<%= project.img.src %>',
						src: ['<%= project.img.allExtensions %>'],
						dest: '<%= project.img.build %>'
					}
				]
			},
			html: {
				files: [
					{
						expand: true,
						cwd: '<%= project.src %>',
						src: ['*.html'],
						dest: '<%= project.build %>'
					}
				]
			},
			other: {
				files: [
					{
						expand: true,
						cwd: '<%= project.src %>',
						src: ['CNAME', 'favicon.ico'],
						dest: '<%= project.build %>'
					}
				]
			}
		},

		'gh-pages': {
			options: {
				base: 'build'
			},
			src: '**/*'
		},

		browserSync: {
			bsFiles: {
				src: [
					'<%= project.build %>/*.html',
					'<%= project.img.build %>/**/*.{png,jpg,gif,svg}',
				]
			},
			options: {
				server: {
					baseDir: '<%= project.build %>'
				},
				watchTask: true,
				notify: false,
				online: false,
				ghostMode: false
			}
		},

		bsReload: {
			css: {
				reload: '<%= project.css.build %>'
			},
			all: {
				reload: true
			}
		},

		watch: {
			options: {
				spawn: false
			},
			pcss: {
				files: ['<%= project.css.dir %>/*.pcss'],
				tasks: ['postcss:default', 'bsReload:css'],
			},
			img: {
				files: ['<%= project.img.src %>/<%= project.img.allExtensions %>'],
				tasks: ['newer:copy:images', 'bsReload:all']
			},
			html: {
				files: ['<%= project.src %>/*.html'],
				tasks: ['newer:copy:html']
			},
		}

	});

	require('jit-grunt')(grunt, {
		usebanner: 'grunt-banner'
	});

	grunt.registerTask('default', ['newer:copy', 'postcss:default', 'browserSync', 'watch']);
	grunt.registerTask('build', ['clean', 'copy', 'postcss:default', 'postcss:minify', 'usebanner']);
	grunt.registerTask('deploy', ['build', 'gh-pages']);
};
