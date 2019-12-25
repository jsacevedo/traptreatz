const gulp = require('gulp')
const settings = require('./settings')
const webpack = require('webpack')
const browserSync = require('browser-sync').create()
const sass = require('gulp-sass')

gulp.task('sass', function() {
  return gulp.src(settings.themeLocation + 'scss/style.scss')
    .pipe(sass())
    .on('error', sass.logError)
    .pipe(gulp.dest(settings.themeLocation))
})

gulp.task('scripts', function(callback) {
  webpack(require('./webpack.config.js'), function(err, stats) {
    if (err) {
      console.log(err.toString())
    }

    console.log(stats.toString())
    callback()
  })
})

gulp.task('watch', function() {
  browserSync.init({
    notify: false,
    proxy: settings.urlToPreview,
    ghostMode: false
  })

  gulp.watch('./**/*.php', function(cb) {
    browserSync.reload()
    cb()
  })
  gulp.watch(settings.themeLocation + 'scss/**/*.scss', gulp.parallel('waitForStyles'))
  gulp.watch([settings.themeLocation + 'js/modules/*.js', settings.themeLocation + 'js/scripts.js'], gulp.parallel('waitForScripts'))
})

gulp.task('waitForStyles', gulp.series('sass', function(cb) {
  return gulp.src(settings.themeLocation + 'style.css')
    .pipe(browserSync.stream())
}))

gulp.task('waitForScripts', gulp.series('scripts', function(cb) {
  browserSync.reload()
  cb()
}))