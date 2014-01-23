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
            },
            cmsProd: {
                options: {
                    style: 'nested'
                },
                files: {
                    'Boilerplate/css/cms/css/cms.css': 'Boilerplate/css/cms/sass/cms.scss'
                }
            },
            cmsDist: {
                options: {
                    style: 'compressed'
                },
                files: {
                    'Boilerplate/css/cms/css/cms.min.css': 'Boilerplate/css/cms/sass/cms.scss'
                }
            }
        },
		watch: {
            theme: {
                files: ['themes/boilerplate/sass/*.scss'],
                tasks: ['sass:prod', 'sass:dist'],
                options: {
                    spawn: false
                }
            },
            cms: {
                files: ['Boilerplate/css/cms/sass/*.scss'],
                tasks: ['sass:cmsProd', 'sass:cmsDist'],
                options: {
                    spawn: false
                }
            }
		}
	});
    grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.registerTask('default',['watch:theme']);
}