/* File: gulpfile.js */

// grab our packages
var gulp        = require('gulp'),
    eslint      = require('gulp-eslint'),
    sass        = require('gulp-sass'),
    sourcemaps  = require('gulp-sourcemaps'),
    concat      = require('gulp-concat')
    path        = require('path'),
    merge       = require('merge-stream'),
    gutil       = require('gulp-util'),
    browserSync = require('browser-sync'),
    reload      = browserSync.reload;
    uglify      = require('gulp-uglify');

// define the default task and add the watch task to it
gulp.task('default', ['watch']);

gulp.task('browser-sync', function() {
    var files = [
    './build/assets/css/theme.css',
    './*.php',
    './page-templates/*.php'
    ];

    //initialize browsersync
    browserSync.init(files, {
    //browsersync with a php server
    proxy: "localhost:8000/",
    notify: true
    });
});

// configure the jshint task
gulp.task('eslint', function() {
    return gulp.src('src/js/**/*.js')
        .pipe(eslint())
        // eslint.format() outputs the lint results to the console.
        .pipe(eslint.format());
        // To have the process exit with an error code (1) on
        // lint error, return the stream and pipe to failAfterError last.
        // .pipe(eslint.failAfterError());
});

gulp.task('build-css', function() {
    return gulp.src('src/scss/*.scss')
        .pipe(sourcemaps.init())  // Process the original sources
        .pipe(sass({outputStyle: 'compressed'}))
        .pipe(concat('theme.css'))
        .pipe(sourcemaps.write()) // Add the map to modified source.
        .pipe(gulp.dest('build/assets/css'))
        .pipe(reload({stream:true}));
});

gulp.task('build-js', function() {
    return gulp.src(['src/js/user/*.js', 'src/js/vendor/*.js'])
        .pipe(sourcemaps.init())
        .pipe(concat('bundle.js'))
        //only uglify if gulp is ran with '--type production'
        .pipe(gutil.env.type === 'production' ? uglify() : gutil.noop())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('build/assets/js'));
});

// configure which files to watch and what tasks to use on file changes
gulp.task('watch', ['build-css', 'browser-sync'], function() {
    gulp.watch('src/js/**/*.js', ['eslint']);
    gulp.watch('src/js/user/*.js', ['build-js']);
    gulp.watch('src/scss/**/*.scss', ['build-css']);

});
