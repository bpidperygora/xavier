module.exports = function () {
    $.gulp.task('watch', function () {
        $.gulp.watch('./src/styles/**/*.scss', $.gulp.series('styles'));
        $.gulp.watch('./src/images/**/*.{png,jpg,gif,svg}', $.gulp.series('img'));
        $.gulp.watch('./src/images/svg/*.svg', $.gulp.series('svg'));
        $.gulp.watch('./src/scripts/**/*.js', $.gulp.series('js'));
        $.gulp.watch('./src/scripts/components/min/**/*.js', $.gulp.series('js:min'));
    });
};
