const imagemin = require('gulp-imagemin'),
    cache = require('gulp-cache'),
    imgCompress  = require('imagemin-jpeg-recompress'),
    imgPATH = {
        "input": ["./src/images/**/*.{png,jpg,gif,svg}",
            '!./src/images/svg/*'],
        "output": "./build/images/"
    };

module.exports = function () {
    $.gulp.task('img', () => {
        return $.gulp.src(imgPATH.input)
            .pipe(cache(imagemin([
                imgCompress({
                    loops: 4,
                    min: 70,
                    max: 80,
                    quality: 'high'
                }),
                imagemin.gifsicle(),
                imagemin.optipng(),
                imagemin.svgo()
            ])))
            .pipe($.gulp.dest(imgPATH.output));
    });
};

