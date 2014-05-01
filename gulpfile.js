var gulp = require("gulp"),
    minifycss = require("gulp-minify-css"),
    uglify = require("gulp-uglify"),
    concat = require("gulp-concat"),
    rename = require("gulp-rename");

gulp.task("css", function() {
    return gulp.src([
            "public/bower_components/bootstrap/dist/css/bootstrap.css",
            "public/bower_components/fontawesome/css/font-awesome.css",
            "public/bower_components/toastr/toastr.css",
            "public/css/style.css"
        ])
        .pipe(concat("all.css"))
        .pipe(gulp.dest("public/css/"))
        .pipe(rename({ suffix: ".min" }))
        .pipe(minifycss())
        .pipe(gulp.dest("public/css/"));
});

gulp.task("scripts", function() {
    return gulp.src([
            "public/bower_components/bootstrap/dist/js/bootstrap.js",
            "public/js/libs/kendo.web.min.js",
            "public/js/libs/spin.min.js",
            "public/bower_components/angular/angular.js",
            "public/bower_components/highcharts.com/js/highcharts.src.js",
            "public/js/libs/jquery.printPage.js",
            "public/js/application/app.js",
            "public/js/application/controllers/dashboard-controller.js",
            "public/js/application/services/api-service.js",
            "public/js/app.js",
            "public/js/custom-modules.js"
        ])
        .pipe(concat("all.js"))
        .pipe(gulp.dest("public/js/"))
        .pipe(rename({ suffix: ".min" }))
        .pipe(uglify())
        .pipe(gulp.dest("public/js/"));
});

gulp.task("cssForPrintPage", function() {
    return gulp.src([
            "content/css/bootstrap.css",
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
            "public/bower_components/bootstrap/dist/css/bootstrap.css",
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
            "public/bower_components/jquery/dist/jquery.js",
            "public/bower_components/bootstrap/dist/js/bootstrap.js",
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