const
    scss = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    csscomb = require('gulp-csscomb'),
    stylesPATH = {
        "input": "./src/styles/",
        "output": "./build/css/",
    };

module.exports = function () {
    $.gulp.task('styles', () => {
        return $.gulp.src([stylesPATH.input + '**/*.scss', '!' + stylesPATH.input + 'lib/**/*.scss', '!' + stylesPATH.input + 'modules/**/*.scss'])
            .pipe(scss())
            .pipe(autoprefixer({
                overrideBrowserslist:  ['last 10 versions']
            }))
            .pipe(csscomb())
            .pipe($.gulp.dest(stylesPATH.output))
    });
};
