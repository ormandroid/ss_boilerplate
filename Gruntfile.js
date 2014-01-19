module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		sass: {
            prod: {
                options: {
                    style: 'nested'
                },
                files: {
                    'themes/boilerplate/css/main.css': 'themes/boilerplate/sass/main.scss'
                }
            },
            dist: {
                options: {
                    style: 'compressed'
                },
                files: {
                    'themes/boilerplate/css/main.min.css': 'themes/boilerplate/sass/main.scss'
                }
            }
        },
		watch: {
            css: {
                files: ['themes/boilerplate/sass/*.scss'],
                tasks: ['sass:prod', 'sass:dist'],
                options: {
                    spawn: false,
                }
            }
		}
	});
    grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.registerTask('default',['watch']);
}