var gulp = require('gulp');
var postcss = require('gulp-postcss');
var sass = require('gulp-sass');
var sleep = require('sleep');

var autoprefixer = require('autoprefixer');
var cssnano = require('cssnano');

gulp.task('lov', function () {
    sleep.sleep(1);
    var processors = [
        autoprefixer,
        cssnano
    ];
    return gulp.src('./stylesheets/*.sass')
        .pipe(sass().on('error', sass.logError))
        .pipe(postcss( processors ))
        .pipe(gulp.dest('./public/asset/css/'));
});

//Watch task
gulp.task('default',function() {
    gulp.watch('./stylesheets/*.sass',['lov']);
});
