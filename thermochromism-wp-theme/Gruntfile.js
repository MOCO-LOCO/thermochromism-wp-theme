module.exports = function(grunt) {

  require('load-grunt-tasks')(grunt);
  
  var manifest = {
    pkg: grunt.file.readJSON( 'package.json' ),
    bwr: grunt.file.readJSON( 'bower.json' )
  };
  grunt.initConfig({
      manifest: manifest,
      sass: {
          options: {
              precision: 11
          },
          dist: {
              files: {
                'style.css': 'scss/style.scss'
              }
          }
      },
      watch: {
        files: ['bower_components/**/package.json','scss/_*.scss','scss/style.scss' ,       'scss/cartesian/scss/_*.scss','scss/cartesianscss/style.scss','!scss/_bower.scss'],
        tasks: ['sass', 'autoprefixer'],
        options: {livereload: true}
      },
      bower_concat: {
        all: {
          dest: 'js/bower.js',
          cssDest: 'scss/_bower.scss'
        }
      },
      copy: {
        theme: {
          files: [
            { expand: true, src: ['*.{png,php,js,css,json,md,txt,html}', 'layouts/**', 'languages/**', 'js/**', 'images/**', 'inc/**'], dest: 'thermochromism-wp-theme/' }
          ]
        } 
      },
      compress: {
        theme: {
          options: { archive: 'thermochromism-wp-theme.zip' },
          files: [ { src: ['thermochromism-wp-theme/**/**']} ]
        }
      },
      autoprefixer: {
        options:{
          browsers: ['last 2 versions', 'ie 9']
        },
        dist: {
          src: 'style.css'
        }
      }
  });
  grunt.registerTask( 'build', ['bower_concat','sass', 'autoprefixer', 'copy', 'compress' ] );
  grunt.registerTask( 'default', ['build'] );
  
};