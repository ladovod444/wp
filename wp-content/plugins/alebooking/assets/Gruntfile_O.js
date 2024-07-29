module.exports = function(grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        concat: {
            dist: {
                src: ['src/styles/*.scss'],
                dest: 'src/master.scss',
            }
        },

        sass: {
            build: {
                options: {
                    style: 'expanded'
                },
                files: {
                    'dist/styles/style.css': 'src/master.scss'
                }
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('default', ['concat', 'sass']);

    //grunt.registerTask('default', ['sass:dist']);
};