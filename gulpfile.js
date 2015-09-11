var gulp = require('gulp'); 

var jshint = require('gulp-jshint');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var ngannotate = require('gulp-ng-annotate');
var templateCache = require('gulp-angular-templatecache');
var htmlReplace = require('gulp-html-replace');

// Build angular template cache
gulp.task('templates', function() {
	return gulp.src('templates/*.html')
				.pipe(gulp.dest('dist/templates'))
				.pipe(templateCache({
					'root': 'templates/',
					'module': 'cscrew'
				}))
				.pipe(gulp.dest('dist/js'));
});
gulp.task('admintemplates', function() {
	return gulp.src('templates/admin/*.html')
				.pipe(gulp.dest('dist/templates/admin'))
				.pipe(templateCache({
					'root': 'templates/admin/',
					'module': 'cscrew'
				}))
				.pipe(rename('admintemplates.js'))
				.pipe(gulp.dest('dist/js'));
});

// Concatenate & Minify JS
gulp.task('scripts', function() {
    return gulp.src([
			'js/cscrewapp.js',
			'js/userservice.js',
			'js/helphourservice.js',
			'js/signinservice.js',
			'js/cscrewctrl.js',
			'js/adminctrl.js',
		])
		.pipe(jshint())
        .pipe(jshint.reporter('default'))
		.pipe(ngannotate())
        .pipe(uglify())
		.pipe(concat('cscrew.js'))
        .pipe(gulp.dest('dist/js'));
});

gulp.task('signinscripts', function() {
    return gulp.src([
        'js/signinapp.js',
        'js/signinservice.js',
        'js/signinctrl.js'
    ])
    .pipe(jshint())
    .pipe(jshint.reporter('default'))
    .pipe(ngannotate())
    .pipe(uglify())
    .pipe(concat('signin.js'))
    .pipe(gulp.dest('dist/js'));
});

gulp.task('tvdashscripts', function() {
    return gulp.src([
        "js/tvdashapp.js",
        "js/signinservice.js",
        "js/helphourservice.js",
        "js/tvdashctrl.js",
    ])
    .pipe(jshint())
    .pipe(jshint.reporter('default'))
    .pipe(ngannotate())
    .pipe(uglify())
    .pipe(concat('tvdash.js'))
    .pipe(gulp.dest('dist/js'));
});

// Concatenate and minify vendor JS
gulp.task('vendorjs', function() {
	return gulp.src([
			'js/unslider.min.js',
			'js/angular-ui-router.min.js',
			'js/ui-bootstrap-tpls-0.13.0.min.js',
			'js/moment.js',
			'js/angular-moment.min.js'
			])
			.pipe(concat('vendor.js'))
			.pipe(gulp.dest('dist/js'));
})

// Copy all CSS
gulp.task('cssmain', function() {
	return gulp.src('css/*.css')
			.pipe(gulp.dest('dist/css'));
});

// Copy all CSS partials
gulp.task('csspartials', function() {
	return gulp.src('css/partials/*.css')
			.pipe(gulp.dest('dist/css/partials'));
});

// All CSS
gulp.task('css', ['cssmain', 'csspartials']);

// Copy images
gulp.task('copyimg', function() {
	return gulp.src('img/*')
			.pipe(gulp.dest('dist/img'));
});

// Copy login
gulp.task('copylogin', function() {
	return gulp.src('login/*')
			.pipe(gulp.dest('dist/login'));
});

// Copy other misc files
gulp.task('copyother', function() {
	return gulp.src([
				'.htaccess',
			])
			.pipe(gulp.dest('dist'));
});

// Process index.html
gulp.task('indexhtml', function() {
	return gulp.src('*.html')
			.pipe(htmlReplace({
				'js': ['js/vendor.js', 'js/cscrew.js', 'js/templates.js']
			}))
			.pipe(gulp.dest('dist'));
});

gulp.task('signinphp', function() {
    return gulp.src('signin.php')
        .pipe(htmlReplace({
            'js': ['js/signin.js']
        }))
        .pipe(gulp.dest('dist'));
});

gulp.task('tvdashphp', function() {
    return gulp.src('tvdash.php')
        .pipe(htmlReplace({
            'js': ['js/tvdash.js', 'js/vendor.js']
        }))
        .pipe(gulp.dest('dist'));
});


gulp.task('copy', ['copyimg', 'copylogin', 'copyother']);
gulp.task('default', ['templates', 'admintemplates', 'scripts', 'signinscripts', 'tvdashscripts', 'vendorjs', 'css', 'copy', 'indexhtml', 'signinphp', 'tvdashphp']);
