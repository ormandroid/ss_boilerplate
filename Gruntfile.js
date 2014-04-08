module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		sass: {
            boilerplate: {
                options: {
                    style: 'compressed'
                },
                files: {
                    'Boilerplate/css/main.min.css': 'Boilerplate/sass/main.scss'
                }
            }
        },
		watch: {
            boilerplate: {
                files: ['Boilerplate/sass/*.scss'],
                tasks: ['sass:boilerplate'],
                options: {
                    spawn: false
                }
            }
		}
	});
    grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.registerTask('default',['watch:boilerplate']);
}