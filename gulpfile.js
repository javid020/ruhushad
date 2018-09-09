var gulp = require('gulp');
var uglify = require('gulp-uglify');
var livereload = require('gulp-livereload');
var concat = require('gulp-concat');
var minifyCss = require('gulp-minify-css');
var autoprefixer = require('gulp-autoprefixer');
var plumber = require('gulp-plumber');
var sourcemaps = require('gulp-sourcemaps');
var sass = require('gulp-sass');
var babel = require('gulp-babel');


//Files Path
var DIST_PATH = 'assets/dist';
var SCRIPTS_PATH = 'assets/js/**/*.js';
var CSS_PATH = 'assets/css/**/*.css';


//Styles in CSS
// gulp.task('styles', function(){
//     console.log('starting styles task');
//     return gulp.src(CSS_PATH)
//         .pipe(plumber(function(err){
//             console.log('styles task Error');
//             console.log(err);
//             this.emit('end');
//         }))
//         .pipe(sourcemaps.init())
//         .pipe(autoprefixer())
//         .pipe(concat('concat.css'))
//         .pipe(minifyCss())
//         .pipe(sourcemaps.write())
//         .pipe(gulp.dest(DIST_PATH))
//         .pipe(livereload());
// });

//Styles in SASS
gulp.task('styles', function(){
    console.log('starting styles task');
    return gulp.src('assets/scss/main.scss')
        .pipe(plumber(function(err){
            console.log('styles task Error');
            console.log(err);
            this.emit('end');
        }))
        .pipe(sourcemaps.init())
        .pipe(sass({
            outputStyle: 'compressed'
        }))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(DIST_PATH))
        .pipe(livereload());
});

//Scripts
gulp.task('scripts', function(){
    console.log('starting scripts task');
    return gulp.src(SCRIPTS_PATH)
        .pipe(plumber(function(err){
            console.log('scripts task Error');
            console.log(err);
            this.emit('end');
        }))
        .pipe(sourcemaps.init())
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(uglify())
        .pipe(concat('concat.js'))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(DIST_PATH))
        .pipe(livereload());
});

//Images
gulp.task('images', function(){
    console.log('starting images task');
});

//Default
gulp.task('default', ['images','styles','scripts'], function(){
    console.log('starting default task');
});

//Watch
gulp.task('watch', ['default'], function(){
    console.log('starting watch task');
    require('./server.js');
    livereload.listen();
    gulp.watch(SCRIPTS_PATH, ['scripts']);
    // gulp.watch(CSS_PATH, ['styles']);
    gulp.watch('assets/scss/**/*.scss', ['styles']);

});
