// Initialize modules
// Importing specific gulp API functions lets us write them below as series() instead of gulp.series()
const { src, dest, watch, series, parallel, gulp } = require('gulp');
// Importing all the Gulp-related packages we want to use
const sourcemaps = require('gulp-sourcemaps');
//const sass = require('gulp-sass');
const sass = require('gulp-sass')(require('sass'));

const concat = require('gulp-concat');
// const uglify = require('gulp-uglify');
const uglify = require('gulp-uglify-es').default;
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');


// File paths
const files = { 
    scssPath: 'assets/src/scss/*.scss',
    jsPath: 'assets/src/js/*.js',

    common_scssPath: 'assets/src/scss/common/*.scss',
    layout_scssPath: 'assets/src/scss/layout/*.scss',
    
    common_jsPath: 'assets/src/js/common/*.js',
    layout_jsPath: 'assets/src/js/layout/*.js',

    blocks_scssPath: 'includes/basetheme-blocks-handler/blocks/**/lib/scss/*.scss',
    blocks_jsPath: 'includes/basetheme-blocks-handler/blocks/**/lib/js/*.js',
}

// For Dev 
// Sass task: compiles the style.scss file into style.css
function scssTask(){    
    const tailwindcss = require('tailwindcss'); 
    return src([
        files.scssPath,
        files.blocks_scssPath,
        ])
        .pipe(sourcemaps.init()) // initialize sourcemaps first
        .pipe(sass({outputStyle: 'compressed'})) // compile SCSS to CSS
        .pipe(postcss([ 
            tailwindcss("./tailwind.config.js"), 
            autoprefixer(), 
            //cssnano() 
        ]))
        .pipe(sourcemaps.write('.')) // write sourcemaps file in current directory
        .pipe(concat('main.css'))
        .pipe(dest('./assets/dist/css')
    ); // put final CSS in dist folder
}

// JS task: concatenates and uglifies JS files to script.js
function jsTask(){
    return src([
        files.jsPath,
        files.blocks_jsPath,
        files.common_jsPath,
        files.layout_jsPath,
        ])
        .pipe(concat('main.js'))
        .pipe(uglify())
        .pipe(dest('./assets/dist/js')
    );
}


// Watch task: watch SCSS and JS files for changes
// If any change, run scss and js tasks simultaneously
function watchTask(){
    watch([
            files.scssPath,
            files.blocks_scssPath,
            files.common_scssPath,
            files.layout_scssPath,
            "./tailwind.config.js",
            "./*.php", 
            "./templates/**/*.php",
            "./woocommerce/**/*.php",
            "./includes/basetheme-blocks-handler/blocks/**/*.php" // watch also php files or templates
          ], 
        series(
            parallel(scssTask)
        )
    );
    watch([
            files.jsPath,
            files.blocks_jsPath,
            files.common_jsPath,
            files.layout_jsPath,
          ], 
        series(
            parallel(jsTask)
        )
    );
    console.log("\n\t","Watching for Changes..\n");
}

// Export the default Gulp task so it can be run
// Runs the scss and js tasks simultaneously
// then runs cacheBust, then watch task
exports.default = series(
    parallel(scssTask, jsTask),
    watchTask
);