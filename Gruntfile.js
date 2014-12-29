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
        files: ['bower_components/**/package.json','scss/_*.scss','scss/style.scss','!scss/_bower.scss'],
        tasks: ['sass', 'autoprefixer']
      },
      bower_concat: {
        all: {
          dest: 'js/bower.js',
          cssDest: 'scss/_bower.scss'
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
  grunt.registerTask( 'build', ['bower_concat','sass', 'autoprefixer'] );
  grunt.registerTask( 'default', ['build'] );
  
};