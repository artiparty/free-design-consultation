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
			},
			autoprefixer: {
				options: {
					map: false,
					processors: [
						require('autoprefixer')({
							browsers: ['last 2 versions', '> 1%', 'Android >= 4', 'iOS >= 8']
						})
					]
				},
				src: '<%= project.build %>/designer-news-statistics-2015/main.css'
			}
		},

		sass: {
			options: {
				sourceMap: false,
				outputStyle: 'expanded'
			},
			dev: {
				files: {
					'<%= project.build %>/designer-news-statistics-2015/main.css': '<%= project.src %>/designer-news-statistics-2015/scss/main.scss'
				}
			},
			dist: {
				files: {
					'<%= project.build %>/designer-news-statistics-2015/main.css': '<%= project.src %>/designer-news-statistics-2015/scss/main.scss'
				},
				options: {
					outputStyle: 'compressed'
				}
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
					src: ['<%= project.css.build %>', '<%= project.build %>/designer-news-statistics-2015/main.css']
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
			},
			dnstat: {
				files: [
					{
						expand: true,
						cwd: '<%= project.src %>/designer-news-statistics-2015',
						src: ['img/*.*', 'js/*.*'],
						dest: '<%= project.build %>/designer-news-statistics-2015'
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

		php: {
			dist: {
				options: {
					hostname: '127.0.0.1',
					port: 9000,
					base: '<%= project.src %>/designer-news-statistics-2015',
					keepalive: true,
					open: true
				}
			}
		},

		shell: {
			options: {
				stderr: false
			},
			php: {
				command: 'cd <%= project.src %>/designer-news-statistics-2015 && php -f index.php > ../../<%= project.build %>/designer-news-statistics-2015/index.html'
			}
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
			sass: {
				files: ['<%= project.src %>/designer-news-statistics-2015/scss/*.scss'],
				tasks: ['sass:dev', 'postcss:autoprefixer', 'bsReload:all'],
			},
			php: {
				files: ['<%= project.src %>/designer-news-statistics-2015/**/*.{php,csv}'],
				tasks: ['shell', 'bsReload:all'],
			},
		}

	});

	require('jit-grunt')(grunt, {
		usebanner: 'grunt-banner'
	});

	grunt.registerTask('default', ['newer:copy', 'postcss:default', 'sass:dev', 'postcss:autoprefixer', 'shell', 'browserSync', 'watch']);
	grunt.registerTask('build', ['clean', 'copy', 'postcss:default', 'postcss:minify', 'sass:dist', 'postcss:autoprefixer', 'shell', 'usebanner']);
	grunt.registerTask('deploy', ['build', 'gh-pages']);
};
