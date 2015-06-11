module.exports = function(grunt) {

    // 1. All configuration goes here 
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        
        // prefix css selectors
        autoprefixer: {
            options: {
              browsers: 'last 2 version'
            },
            multiple_files: {
                expand: true,
                flatten: true,
                src: '_build/css/*.css', 
                dest: '_build/css'
            }
        },

        // minify css files
        cssmin:{
            combine: {
              files: {
                '_build/css/styles.css': '_build/css/*.css'
              }
            },
            minify: {
              expand: true,
              cwd: '_build/css',
              src: ['styles.css', '!*.min.css'],
              dest: 'assets/css/',
              ext: '.min.css'            
            }            
        },
      watch: {
        css: {
          files: [
            '_build/css/*.css'
          ],
          tasks: ['cssmin'],
        },
      }
    });

    // 3. Where we tell Grunt we plan to use this plug-in.
    grunt.loadNpmTasks('grunt-autoprefixer');
    //grunt.loadNpmTasks('grunt-contrib-concat');
    //grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-watch');

    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
    grunt.registerTask('default', ['autoprefixer', 'cssmin', 'watch']);

};