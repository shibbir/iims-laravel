var gulp      = require("gulp"),
    del       = require("del"),
    uglify    = require("gulp-uglify"),
    concat    = require("gulp-concat"),
    rename    = require("gulp-rename"),
    imagemin  = require("gulp-imagemin"),
    minifycss = require("gulp-minify-css");

var paths = {
    css: {
        site: [
            "public/bower_components/bootstrap/dist/css/bootstrap.css",
            "public/bower_components/fontawesome/css/font-awesome.css",
            "public/bower_components/toastr/toastr.css",
            "public/css/jquery.cleditor.css",
            "public/css/style.css"
        ],
        login: [
            "public/bower_components/bootstrap/dist/css/bootstrap.css",
            "public/css/style.css"
        ],
        print: [
            "public/bower_components/bootstrap/dist/css/bootstrap.css",
            "public/css/style-print.css"
        ]
    },
    scripts: {
        libs: [
            "public/bower_components/jquery/dist/jquery.js",
            "public/bower_components/bootstrap/dist/js/bootstrap.js",
            "public/bower_components/angular/angular.js",
            "public/bower_components/angular-i18n/angular-locale_bn-bd.js",
            "public/bower_components/toastr/toastr.js",
            "public/bower_components/lodash/dist/lodash.js",
            "public/js/libs/highcharts.src.js",
            "public/js/libs/jquery.cleditor.js",
            "public/js/libs/jquery.printPage.js"
        ],
        app: [
            "public/js/application/app.js",

            "public/js/application/services/apiService.js",
            "public/js/application/services/notifierService.js",
            "public/js/application/services/customerService.js",
            "public/js/application/services/productService.js",

            "public/js/application/controllers/baseCtrl.js",
            "public/js/application/controllers/dashboardCtrl.js",
            "public/js/application/controllers/salesInvoiceCtrl.js"
        ]
    },
    fonts: [
        "public/bower_components/fontawesome/fonts/FontAwesome.otf",
        "public/bower_components/fontawesome/fonts/fontawesome-webfont.eot",
        "public/bower_components/fontawesome/fonts/fontawesome-webfont.svg",
        "public/bower_components/fontawesome/fonts/fontawesome-webfont.ttf",
        "public/bower_components/fontawesome/fonts/fontawesome-webfont.woff"
    ],
    images: "public/img/**/*"
};

gulp.task("clean", function(cb) {
    del(["public/build"], cb);
});

gulp.task("Fonts", ["clean"], function() {
    return gulp.src(paths.fonts)
        .pipe(gulp.dest("public/build/fonts"));
});

gulp.task("Images", ["clean"], function() {
    return gulp.src(paths.images)
        .pipe(imagemin({optimizationLevel: 5}))
        .pipe(gulp.dest("public/build/img"));
});

gulp.task("SiteCSS", ["clean"], function() {
    return gulp.src(paths.css.site)
        .pipe(concat("site.css"))
        .pipe(gulp.dest("public/build/css"))
        .pipe(rename({ suffix: ".min" }))
        .pipe(minifycss())
        .pipe(gulp.dest("public/build/css"));
});

gulp.task("LibraryScripts", ["clean"], function() {
    return gulp.src(paths.scripts.libs)
        .pipe(concat("libs.js"))
        .pipe(gulp.dest("public/build/js"))
        .pipe(rename({ suffix: ".min" }))
        .pipe(uglify())
        .pipe(gulp.dest("public/build/js"));
});

gulp.task("AppScripts", ["clean"], function() {
    return gulp.src(paths.scripts.app)
        .pipe(concat("app.js"))
        .pipe(gulp.dest("public/build/js"))
        .pipe(rename({ suffix: ".min" }))
        .pipe(uglify())
        .pipe(gulp.dest("public/build/js"));
});

gulp.task("PrintPageCSS", function() {
    return gulp.src(paths.css.print)
        .pipe(concat("printer.css"))
        .pipe(gulp.dest("public/build/css/"))
        .pipe(rename({ suffix: ".min" }))
        .pipe(minifycss())
        .pipe(gulp.dest("public/build/css/"));
});

gulp.task("LoginCSS", ["clean"], function() {
    return gulp.src(paths.css.login)
        .pipe(concat("login.css"))
        .pipe(gulp.dest("public/build/css/"))
        .pipe(rename({ suffix: ".min" }))
        .pipe(minifycss())
        .pipe(gulp.dest("public/build/css/"));
});

gulp.task("Watch", function() {
    gulp.watch(paths.scripts.libs, ["LibraryScripts"]);
    gulp.watch(paths.css.site, ["LoginCSS", "SiteCSS", "Fonts", "Images"]);
});

gulp.task("default", ["Watch", "LoginCSS", "SiteCSS", "Fonts", "Images", "LibraryScripts", "AppScripts"]);