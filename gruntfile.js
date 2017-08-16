'use strict';
module.exports = function(grunt) {
  // Load all tasks
  require('load-grunt-tasks')(grunt);
  // Show elapsed time
  require('time-grunt')(grunt);

  var jsFileList = [
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
    './assets/js/plugins/*.js',
    './assets/js/plugins/**/*.js',
    './assets/js/theme.js'
  ];

  // Initialize configuration object
  grunt.initConfig({

    //Delete existing CSS
    clean: {
      contents: ['./public/css/*', './assets/css/*'],
    },

    //Less tasks
    less: {
    dev_slvrbck: {
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
    dev_bestcaseonline: {
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
    dev_misc: {
      plugins: [
        new (require('less-plugin-autoprefix'))({browsers: ["> 5%, last 2 versions"]})
      ],
      files: {
        "./public/css/wp-login.min.css":"./assets/less/wp-login.less",
        "./assets/css/bestcaseonline.pretty.css":"./assets/less/bestcaseonline.pretty.less",
      },
    },
    dist: {
      options: {
        compress: true,
      },
      plugins: [
        new (require('less-plugin-autoprefix'))({browsers: ["> 5%, last 2 versions"]})
      ],
      files: {
        "./public/css/wp-login.min.css":"./assets/less/wp-login.less",
        "./public/css/silverback.min.css":"./assets/less/silverback/main-silverback.less",
        "./public/css/bestcaseonline.min.css":"./assets/less/silverback/troops/bestcaseonline/main-bestcaseonline.less"
      },
    },
},


    // Concatenate and minify
    concat: {
      options: {
        separator: ';',
      },
      development: {
        src: [jsFileList],
        dest: './assets/js/script.js',
      },
    },
    uglify: {
      dist: {
        files: {
          './public/js/script.min.js': './assets/js/script.js',
        }
      }
    },
    jshint: {
      options: {
        jshintrc: '.jshintrc'
      },
      all: [
        'gruntfile.js',
        'assets/js/*.js',
        '!assets/js/script.js',
      ]
    },

    watch: {
      js: {
        files: [
          jsFileList,
          '<%= jshint.all %>'
        ],
        tasks: ['jshint', 'concat', 'copy:devJs'],
      },
      less: {
        files: [
          './assets/less/*.less',
          './assets/less/**/*.less',
          './assets/less/troops/**/*.less',
          './assets/less/troops/bestcaseonline/**/*.less',
        ],
        tasks: ['less:dev_slvrbck', 'less:dev_bestcaseonline', 'less:dev_misc'],
      },
      images: {
        files: ['./assets/img/**/*.{png,jpg,gif}'],
        tasks: ['imagemin'],
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
          './public/css/*.css',
          './assets/js/*.js'
        ]
      }
    },

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
    devJs: {
      files: [{
        expand: true,
        cwd: './assets/js/',
        dest: './public/js/',
        src: [
          'script.js'
        ],
        rename: function(dest, src) {
          return dest + src.replace('.js','.min.js');
        }
      }],
    }
  },

  });
  // Compile tasks
  grunt.registerTask('compile', ['clean', 'concat', 'less:dev_slvrbck', 'less:dev_bestcaseonline', 'less:dev_misc', 'jshint', 'copy']);
  grunt.registerTask('build', ['clean','concat', 'less:dist', 'uglify', 'jshint', 'copy']);
  // Set default task
  grunt.registerTask('default', ['watch']);
};
