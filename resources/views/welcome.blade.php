<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel vuejs tutorial</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap-table.css') }}" rel="stylesheet">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="app">
            <navbar-component></navbar-component>
            <sidebar-component></sidebar-component>
            <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
                <div class="row">
                    <router-view>
                    </router-view>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
        <script src="{{ asset('js/bootstrap-table.js') }}"></script>
        <script src="{{ asset('js/fontawesome.min.js') }}"></script>

        <!--Icons-->
        <script src="{{ asset('js/lumino.glyphs.js') }}"></script>
        <script>
            ! function($) {
                $(document).on("click", "ul.nav li.parent > a > span.icon", function() {
                    $(this).find('em:first').toggleClass("glyphicon-minus");
                });
                $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
            }(window.jQuery);
            $(window).on('resize', function() {
                if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
            })
            $(window).on('resize', function() {
                if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
            })

        </script>
        <script>
            $('#calendar').datepicker({});
            ! function($) {
                $(document).on("click", "ul.nav li.parent > a > span.icon", function() {
                    $(this).find('em:first').toggleClass("glyphicon-minus");
                });
                $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
            }(window.jQuery);
            $(window).on('resize', function() {
                if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
            })
            $(window).on('resize', function() {
                if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
            })

        </script>
    </body>
</html>
