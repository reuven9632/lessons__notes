let gulp        = require('gulp'),                //обьявить переменную можно как через так и через var
    sass        = require('gulp-sass'),           //sass придуманное название переменной которой через require передаеться свойства плагина 'gulp-sass'
    browserSync = require('browser-sync'), 
    uglify      = require('gulp-uglify'),
    concat      = require('gulp-concat'),
    rename      = require('gulp-rename')
    del = require('del'),
    autoprefixer = require('gulp-autoprefixer');


gulp.task('clean', async function(){
    del.sync('dist')
});

gulp.task('scss', function(){                     //'scss' придуманное название таска для его вызова а будет это так    gulp scss
    return gulp.src('app/scss/**/*.scss')         //поиск в указанной папке файлы  .scss
        .pipe(sass({outputStyle: 'compressed'}))    //метод .pipe помещает наши файлы в определенное место где к ним будет примененны плагины..   sass конвертирует найденные ранее файлы в css     
        .pipe(autoprefixer({
            overrideBrowserslist: ['last 18 versions']
          }))
        .pipe(rename({suffix: '.min'}))           //rename после выполнения предыдущей функции переименовывает файл, а конкретно ({suffix: '.min'}) где suffix это добавка в конце слова, а '.min' это то что мы хотим конкретно добавить в это место
        .pipe(gulp.dest('app/css'))               //gulp.dest('app/css') говорит .pipe куда поместить переведенный ранее css
        .pipe(browserSync.reload({stream: true})) //говорит  browserSync обновлять страницу для этого таска       
});

gulp.task('css', function(){
    return gulp.src([
        'node_modules/normalize.css/normalize.css',
        'node_modules/slick-carousel/slick/slick.css',
        'node_modules/animate.css/animate.css',

    ])
    .pipe(concat('_libs.scss'))                  //concat обьеденяет найденные ранее файлы в ('*')  название сами придумываем
    .pipe(gulp.dest('app/scss'))
    .pipe(browserSync.reload({stream: true}))
});

gulp.task('html', function(){                     
    return gulp.src('app/*.html')                 //поиск в указанной папке файлы  .html
    .pipe(browserSync.reload({stream: true}))     //говорит  browserSync обновлять страницу для этого таска 
});

gulp.task('script', function(){                   //выполняеться по большому счету для main.js а также других файлов в этой папке
    return gulp.src('app/js/*.js')              //поиск в указанной папке файлы  .js
    .pipe(browserSync.reload({stream: true}))     //говорит  browserSync обновлять страницу для этого таска 
});

gulp.task('js', function(){
    return gulp.src([                            
        'node_modules/slick-carousel/slick/slick.js'
    ])                                            // []  нужно для указания нескольких файлов
    .pipe(concat('libs.min.js'))                  //concat обьеденяет найденные ранее файлы в ('*')  название сами придумываем
    .pipe(uglify())                               // сделаем с ним uglify()
    .pipe(gulp.dest('app/js'))
    .pipe(browserSync.reload({stream: true}))
});

gulp.task('browser-sync', function() {
    browserSync.init({
        server: {
            baseDir: "app/"
        }
    });
});

gulp.task('export', function(){
    let buildHtml = gulp.src('app/**/*.html')
      .pipe(gulp.dest('dist'));
  
    let BuildCss = gulp.src('app/css/**/*.css')
      .pipe(gulp.dest('dist/css'));
  
    let BuildJs = gulp.src('app/js/**/*.js')
      .pipe(gulp.dest('dist/js'));
      
    let BuildFonts = gulp.src('app/fonts/**/*.*')
      .pipe(gulp.dest('dist/fonts'));
  
    let BuildImg = gulp.src('app/img/**/*.*')
      .pipe(gulp.dest('dist/img'));   
});

gulp.task('watch', function(){                              //watch уазанное нами название таска
    gulp.watch('app/scss/**/*.scss', gulp.parallel('scss'))//watch указывает следить за изменениями в файле 'app/scss/**/*.scss' и затем уже с помощью .parallel('*') выполнить таск 'scss' в случае изменения какого либо из файлов слежения
    gulp.watch('app/*.html', gulp.parallel('html'))         //
    gulp.watch('app/js/*.js', gulp.parallel('script'))
});

gulp.task('build', gulp.series('clean', 'export'));

gulp.task('default', gulp.parallel('css', 'scss', 'js', 'browser-sync', 'watch'))