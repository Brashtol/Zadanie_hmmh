var gulp = require('gulp'),
  concat = require('gulp-concat'),
  sass = require('gulp-sass')(require('sass')),
  combineMedia = require('gulp-combine-media'),
  postcss = require('gulp-postcss'),
  autoprefixer = require('autoprefixer'),
  cssnano = require('cssnano'),
  pxToREM = require('postcss-pxtorem'),
  uglify = require('gulp-uglify'),
  rename = require("gulp-rename"),
  watch = require('gulp-watch'),
  browserSync = require('browser-sync').create();

var postcss_plugins = [
    autoprefixer(),
    cssnano(),
    pxToREM({
      rootValue: 16,
      unitPrecision: 5,
      propList: ['*', '!border', '!border-left', '!border-right', '!border-top', '!border-bottom'],
      selectorBlackList: [],
      replace: true,
      mediaQuery: false,
      minPixelValue: 0,
    })
];

gulp.task('postcss', function () {
  return gulp.src('./*.css')
      .pipe(postcss(postcss_plugins))
      .pipe(gulp.dest('./'));
});

gulp.task('scss', function() {
	return gulp.src("css/scss/main.scss")
		.pipe(sass().on('error', sass.logError))
		.pipe(combineMedia())
    .pipe(rename({ basename: "style", extname: ".css" }))
		.pipe(gulp.dest('./'));
});

gulp.task('bootstrap', function() {
	return gulp.src("css/scss/bootstrap/bootstrap-grid.scss")
		.pipe(sass().on('error', sass.logError))
    .pipe(postcss(postcss_plugins))
		.pipe(combineMedia())
    .pipe(rename({ basename: "bootstrap-5-grid-custom", suffix: '.min', extname: ".css" }))
		.pipe(gulp.dest('./css'));
});

gulp.task('compress_js', function () {
  return gulp.src(['js/src/*.js'])
        .pipe(uglify())
        .pipe(rename({ suffix: '.min', extname: ".js" }))
        .pipe(gulp.dest('js/dist'));
});

gulp.task('watch', function () {
  browserSync.init({
    // watch: true,
    proxy: "localhost/zadanie_hmmh",
    port: 82
  });

  gulp.watch('css/scss/**/*.scss', gulp.series('scss', 'postcss'));
  gulp.watch(['js/src/*.js'], gulp.series('compress_js'));
  gulp.watch(["./*.php", "./*.html", './css/*.css', './js/dist/*.js']).on('change', browserSync.reload);
});

gulp.task('default', gulp.series('scss', 'postcss', 'compress_js', 'watch'));
gulp.task('build', gulp.series('scss', 'postcss', 'bootstrap', 'compress_js'));
gulp.task('bootstrap', gulp.series('bootstrap'));
