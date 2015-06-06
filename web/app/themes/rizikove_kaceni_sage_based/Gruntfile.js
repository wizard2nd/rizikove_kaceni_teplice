/*global module:false*/

module.exports = function(grunt) {
    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        meta: {
            css_banner: '/*\n' +
            'Theme Name: Rizikove kaceni teplice based on Sage base wordpress theme' +
            'Author: Jakub Adler\n' +
            '*/\n',
            sass_assets_dir: 'assets/styles',
            css_dest: 'dist/styles/main.css'
        },
        sass: {
            main: {
                files: {
                   '<%= meta.css_dest %>': '<%= meta.sass_assets_dir %>/main.scss'
                }
            }
        },
        cssmin: {
            main: {
                options: {
                    banner: '<%= meta.css_banner %>'
                },
                files: {
                    '<%= meta.css_dest %>': ['<%= meta.css_dest %>']
                }
            }
        },
        watch: {
            sass: {
                files: ['<%= meta.sass_assets_dir %>/**/*.scss'],
                tasks: ['sass', 'cssmin']
            }
        }
    });

    // Load tasks
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    //grunt.loadNpmTasks('grunt-contrib-copy');
    //grunt.loadNpmTasks('grunt-contrib-jshint');
    //grunt.loadNpmTasks('grunt-contrib-uglify');

    // // Default task(s)
    //grunt.registerTask('test', ['jshint']);
    grunt.registerTask('build', ['sass', 'cssmin', 'uglify', 'copy']);
    grunt.registerTask('default', ['test', 'build']);
};