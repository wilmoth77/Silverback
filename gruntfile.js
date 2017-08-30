'use strict';
module.exports = function(grunt) {
  // Load all tasks
  require('load-grunt-tasks')(grunt);
  // Show elapsed time
  require('time-grunt')(grunt);

  var bootstrapJs = [
    './node_modules/bootstrap/js/transition.js',
    './node_modules/bootstrap/js/alert.js',
    './node_modules/bootstrap/js/button.js',
    './node_modules/bootstrap/js/carousel.js',
    './node_modules/bootstrap/js/collapse.js',
    './node_modules/bootstrap/js/dropdown.js',
    './node_modules/bootstrap/js/modal.js',
    './node_modules/bootstrap/js/tooltip.js',
    './node_modules/bootstrap/js/popover.js',
    './node_modules/bootstrap/js/scrollspy.js',
    './node_modules/bootstrap/js/tab.js',
    './node_modules/bootstrap/js/affix.js',
  ];

  var silverbackJs = [
    './assets/js/silverback/plugins/prism/addons/*.js',
    './assets/js/silverback/plugins/prism/prism.js',
    './assets/js/silverback/plugins/*.js',
    './assets/js/silverback/theme.js',
  ];

  var bestcaseJs = [
    './assets/js/troops/bestcaseonline/plugins/*.js',
    './assets/js/troops/bestcaseonline/plugins/**/*.js',
    './assets/js/troops/bestcaseonline/theme.js'
  ];

  // Initialize configuration object
  grunt.initConfig({

    //Delete existing public assets
    clean: {
      contents: ['./public/js/*','./public/css/*', './assets/css/*'],
    },
    // end clean task

    less: {

      //Compile, minify and SourceMap the silverback Less/CSS
      silverbackDev: {
        options: {
          compress: true,
          sourceMap: true,
          sourceMapFilename: 'assets/css/silverback.css.map',
          sourceMapRootpath: '/wp-content/themes/silverback/',
          sourceMapURL: '/wp-content/themes/silverback/assets/css/silverback.css.map'
        },
        plugins: [
          new (require('less-plugin-autoprefix'))({browsers: ["> 5%, last 2 versions"]})
        ],
        files: {
          "./public/css/silverback.min.css":"./assets/less/silverback/main-silverback.less",
        }
      },

      //Compile, minify and SourceMap the bestcaseonline Less/CSS
      bestcaseDev: {
        options: {
          compress: true,
          sourceMap: true,
          sourceMapFilename: 'assets/css/bestcaseonline.css.map',
          sourceMapRootpath: '/wp-content/themes/silverback/',
          sourceMapURL: '/wp-content/themes/silverback/assets/css/bestcaseonline.css.map'
        },
        plugins: [
          new (require('less-plugin-autoprefix'))({browsers: ["> 5%, last 2 versions"]})
        ],
        files: {
          "./public/css/bestcaseonline.min.css":"./assets/less/troops/bestcaseonline/main-bestcaseonline.less",
        }
      },

      // Compile and but do not minify misc Less/CSS
      miscDev: {
        plugins: [
          new (require('less-plugin-autoprefix'))({browsers: ["> 5%, last 2 versions"]})
        ],
        files: {
          "./public/css/wp-login.min.css":"./assets/less/wp-login.less",
          "./assets/css/bestcaseonline.pretty.css":"./assets/less/bestcaseonline.pretty.less",
        },
      },

      //Compile and minify Less/CSS for production - No SourceMap
      production: {
        options: {
          compress: true,
        },
        plugins: [
          new (require('less-plugin-autoprefix'))({browsers: ["> 5%, last 2 versions"]})
        ],
        files: {
          "./public/css/wp-login.min.css":"./assets/less/wp-login.less",
          "./public/css/silverback.min.css":"./assets/less/silverback/main-silverback.less",
          "./public/css/bestcaseonline.min.css":"./assets/less/troops/bestcaseonline/main-bestcaseonline.less"
        },
      },
    }, //end less task


    // Concatenate js production
    concat: {
      options: {
        separator: ';',
      },
      bootstrap: {
        src: [bootstrapJs],
        dest: './assets/js/bootstrap.js',
      },
      silverback: {
        src: [silverbackJs],
        dest: './assets/js/silverback/silverback.js',
      },
      bestcase: {
        src: [bestcaseJs],
        dest: './assets/js/troops/bestcaseonline/bestcase.js',
      },

// Concatenate js dev - Not Minified
      bootstrapDev: {
        src: [bootstrapJs],
        dest: './public/js/silverback.min.js',
      },
      silverbackDev: {
        src: [silverbackJs],
        dest: './public/js/bestcase.min.js',
      },
      bestcaseDev: {
        src: [bestcaseJs],
        dest: './public/js/bootstrap.min.js',
      },
    }, //end concat task


    // Minify js
    uglify: {

      //Minify js for production
      production: {
        files: {
          './public/js/silverback.min.js': './assets/js/silverback/silverback.js',
          './public/js/bestcase.min.js': './assets/js/troops/bestcaseonline/bestcase.js',
          './public/js/bootstrap.min.js': './assets/js/bootstrap.js',
        }
      }
    }, //end uglify task

    jshint: {
      options: {
        jshintrc: '.jshintrc'
      },
      all: [
        'gruntfile.js',
        'assets/js/silverback/theme.js',
        'assets/js/troops/bestcaseonline/theme.js',
      ]
    }, //end jshint task

    watch: {
      js: {
        files: [
          bootstrapJs, silverbackJs, bestcaseJs,
          '<%= jshint.all %>'
        ],
        tasks: ['jshint', 'concat:bootstrapDev', 'concat:bestcaseDev', 'concat:silverbackDev'],
      },

      less: {
        files: [
          './assets/less/*.less',
          './assets/less/**/*.less',
          './assets/less/troops/**/*.less',
          './assets/less/troops/bestcaseonline/**/*.less',
        ],
        tasks: ['less:silverbackDev', 'less:bestcaseDev', 'less:miscDev'],
      },

      html: {
        files: ['**/*.php'],
        tasks: [],
      },

      livereload: {
        options: {
          livereload: true
        },
        files: [
          '**/*.php',
          './assets/less/*.less',
          './assets/less/**/*.less',
          './assets/less/troops/**/*.less',
          './assets/less/troops/bestcaseonline/**/*.less',
          './public/css/*.css',
          './public/js/*.js'
        ]
      }

    }, //end watch task

    copy: {
      bsFonts: {
        files: [{
          expand: true,
          cwd: './node_modules/bootstrap/dist/fonts/',
          dest: './public/fonts',
          src: [
            '*.*'
          ],
        }],
      },
      mdiFonts: {
        files: [{
          expand: true,
          cwd: './node_modules/mdi/fonts/',
          dest: './public/fonts',
          src: [
            '*.*'
          ],
        }],
      },
      mdiCSS: {
        files: [{
          expand: true,
          cwd: './node_modules/mdi/css/',
          dest: './public/css',
          src: [
            'materialdesignicons.min.css'
          ],
        }],
      },
      scrollingTabsJs: {
        files: [{
          expand: true,
          cwd: './node_modules/jquery-bootstrap-scrolling-tabs/dist/',
          dest: './assets/js/troops/bestcaseonline/plugins/',
          src: [
            'jquery.scrolling-tabs.js'
          ],
        }],
      },
      scrollingTabsCss: {
        files: [{
          expand: true,
          cwd: './node_modules/jquery-bootstrap-scrolling-tabs/dist/',
          dest: './public/css',
          src: [
            'jquery.scrolling-tabs.min.css'
          ],
        }],
      },
      clipboardJs: {
        files: [{
          expand: true,
          cwd: './node_modules/clipboard/dist',
          dest: './assets/js/silverback/plugins/prism/addons/',
          src: [
            'clipboard.js'
          ],
        }],
      },
    },

  });
  // Compile tasks
  grunt.registerTask('compile', ['clean', 'concat:bootstrapDev', 'concat:bestcaseDev', 'concat:silverbackDev', 'less:silverbackDev', 'less:bestcaseDev', 'less:miscDev', 'jshint', 'copy']);
  grunt.registerTask('build',   ['clean', 'concat:bootstrap', 'concat:bestcase', 'concat:silverback', 'uglify', 'less:production', 'jshint', 'copy']);
  // Set default task
  grunt.registerTask('default', ['watch']);
};
