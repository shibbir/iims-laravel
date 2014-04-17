var gulp = require("gulp"),
    minifycss = require("gulp-minify-css"),
    uglify = require("gulp-uglify"),
    concat = require("gulp-concat"),
    rename = require("gulp-rename");

gulp.task("css", function() {
    return gulp.src([
            "content/css/kendo.common.min.css",
            "content/css/kendo.bootstrap.min.css",
            "content/css/bootstrap.css",
            "content/css/bootstrap-responsive.css",
            "content/css/font-awesome.css",
            "content/css/style.css"
        ])
        .pipe(concat("all.css"))
        .pipe(gulp.dest("content/css/"))
        .pipe(rename({ suffix: ".min" }))
        .pipe(minifycss())
        .pipe(gulp.dest("content/css/"));
});

gulp.task("scripts", function() {
    return gulp.src([
            "content/js/libs/bootstrap.js",
            "content/js/libs/kendo.web.min.js",
            "content/js/libs/spin.min.js",
            "content/js/libs/handlebars-v1.3.0.js",
            "content/js/libs/highcharts.src.js",
            "content/js/libs/jquery.printPage.js",
            "content/js/app.js",
            "content/js/custom-modules.js"
        ])
        .pipe(concat("all.js"))
        .pipe(gulp.dest("content/js/"))
        .pipe(rename({ suffix: ".min" }))
        .pipe(uglify())
        .pipe(gulp.dest("content/js/"));
});

gulp.task("cssForPrintPage", function() {
    return gulp.src([
            "content/css/bootstrap.css",
            "content/css/bootstrap-responsive.css",
            "content/css/style-print.css"
        ])
        .pipe(concat("printer.css"))
        .pipe(gulp.dest("content/css/"))
        .pipe(rename({ suffix: ".min" }))
        .pipe(minifycss())
        .pipe(gulp.dest("content/css/"));
});

gulp.task("cssForWelcomePage", function() {
    return gulp.src([
            "public/bower_components/bootstrap/docs/assets/css/bootstrap.css",
            "public/bower_components/fontawesome/css/font-awesome.css",
            "public/css/style.css"
        ])
        .pipe(concat("welcome.css"))
        .pipe(gulp.dest("public/css/"))
        .pipe(rename({ suffix: ".min" }))
        .pipe(minifycss())
        .pipe(gulp.dest("public/css/"));
});

gulp.task("scriptsForWelcomePage", function() {
    return gulp.src([
            "public/bower_components/jquery/jquery.js",
            "public/bower_components/bootstrap/docs/assets/js/bootstrap.js",
            "public/js/custom-modules.js",
            "public/js/login.js",
        ])
        .pipe(concat("welcome.js"))
        .pipe(gulp.dest("public/js/"))
        .pipe(rename({ suffix: ".min" }))
        .pipe(uglify())
        .pipe(gulp.dest("public/js/"));
});

gulp.task("default", function() {
    //gulp.run("css");
    //gulp.run("scripts");
    //gulp.run("cssForPrintPage");
    gulp.run("cssForWelcomePage");
    gulp.run("scriptsForWelcomePage");
});