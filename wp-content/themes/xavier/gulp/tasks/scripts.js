const uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    scriptsPATH = {
        "input": "./src/scripts/",
        "output": "./build/js/",
    },
    babel = require('gulp-babel');

module.exports = function () {
    $.gulp.task('libsJS', () => {
        return $.gulp.src([scriptsPATH.input + 'lib/jquery.min.js', scriptsPATH.input + 'lib/**/*.js'])
            .pipe(concat('libs.min.js'))
            .pipe(uglify())
            .pipe($.gulp.dest(scriptsPATH.output));
    });

    $.gulp.task('js:min', () => {
        return $.gulp.src(scriptsPATH.input + 'components/min/**/*.js')
            .pipe(babel({
                presets: ['@babel/env']
            }))
            .pipe(uglify())
            .pipe($.gulp.dest(scriptsPATH.output + 'components/min/'))
    });

    $.gulp.task('js', () => {
        return $.gulp.src([scriptsPATH.input + '**/*.js', '!' + scriptsPATH.input + 'lib/**/*.js', '!' + scriptsPATH.input + 'components/min/**/*.js'])
            .pipe(babel({
                presets: ['@babel/env']
            }))
            .pipe($.gulp.dest(scriptsPATH.output))
    });
};
