"use strict";

global.$ = {
    path: {
        task: require('./gulp/path/tasks.js')
    },
    gulp: require('gulp'),
    del: require('del')
};

$.path.task.forEach(function (taskPath) {
    require(taskPath)();
});

$.gulp.task('default', $.gulp.series(
    'clean',
    $.gulp.parallel(
        'watch',
        'fonts',
        'styles',
        'img',
        'libsJS',
        'js:min',
        'js',
        'svg'
    )
));
