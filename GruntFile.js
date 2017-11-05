module.exports = function(grunt) {
  grunt.initConfig({
    cssmin: {
      target: {
        files: [{
          expand: true,
          cwd: "css/",
          src: ["*.css", "!*.min.css"],
          dest: "css/",
          ext: ".min.css"
        }]
      }
    },
    uglify: {
      options: {
        mangle: true
      },
      my_target: {
        files: [{
          expand: true,
          cwd: "js/",
          src: ["*.js", "!*.min.js"],
          dest: "js/",
          ext: ".min.js"
        }]
      }
    },
    jshint: {
      files: ["js/*.js", "!js/*.min.js", "!js/main.js"],
      options: {
        globals: {
          jQuery: true
        }
      }
    },
    sass: {
      dist: {
        files: [{
          expand: true,
          cwd: "sass/",
          src: ["*.scss"],
          dest: "css/",
          ext: ".css"
        }]
      }
    },
    watch: {
      cssmin: {
        files: ["css/*.css", "!css/*.min.css"],
        tasks: ["cssmin"]
      },
      sass: {
        files: ["sass/*.scss"],
        tasks: ["sass"]
      },
      uglify: {
        files: ["js/*.js", "!js/*.min.js"],
        tasks: ["uglify"]
      },
      jshint: {
        files: ["js/*.js", "!js/*.min.js", "!js/main.js"],
        tasks: ["jshint"]
      }
    }
  });

  grunt.loadNpmTasks("grunt-contrib-cssmin");
  grunt.loadNpmTasks("grunt-contrib-jshint");
  grunt.loadNpmTasks("grunt-contrib-sass");
  grunt.loadNpmTasks("grunt-contrib-uglify");
  grunt.loadNpmTasks("grunt-contrib-watch");

  grunt.registerTask("default", ["all", "watch"]);
  grunt.registerTask("all", ["sass", "cssmin", "uglify"]);
};
