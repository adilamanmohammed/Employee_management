<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Employee Management</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
            html {
                line-height: 1.15;
                -webkit-text-size-adjust: 100%
            }
            body {
                margin: 0
            }
            a {
                background-color: transparent
            }
            [hidden] {
                display: none
            }
            html {
                font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                line-height: 1.5
            }
            *, :after, :before {
                box-sizing: border-box;
                border: 0 solid #e2e8f0
            }
            a {
                color: inherit;
                text-decoration: inherit
            }
            svg, video {
                display: block;
                vertical-align: middle
            }
            video {
                max-width: 100%;
                height: auto
            }
            .bg-white {
                background-color: #fff
            }
            .bg-gray-100 {
                background-color: #f7fafc
            }
            .border-gray-200 {
                border-color: #edf2f7
            }
            .border-t {
                border-top-width: 1px
            }
            .flex {
                display: flex
            }
            .grid {
                display: grid
            }
            .hidden {
                display: none
            }
            .items-center {
                align-items: center
            }
            .justify-center {
                justify-content: center
            }
            .font-semibold {
                font-weight: 600
            }
            .h-5 {
                height: 1.25rem
            }
            .w-5 {
                width: 1.25rem
            }
            .h-6 {
                height: 1.5rem
            }
            .w-6 {
                width: 1.5rem
            }
            .overflow-hidden {
                overflow: hidden
            }
            .text-sm {
                font-size: .875rem
            }
            .text-lg {
                font-size: 1.125rem
            }
            .text-gray-400 {
                color: #cbd5e0
            }
            .text-gray-500 {
                color: #6b7280
            }
            .text-gray-900 {
                color: #111827
            }
            .underline {
                text-decoration: underline
            }
            .antialiased {
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale
            }
            .container {
                max-width: 1280px;
                margin-left: auto;
                margin-right: auto;
                padding-left: 1rem;
                padding-right: 1rem
            }
            .mt-4 {
                margin-top: 1rem
            }
            .ml-4 {
                margin-left: 1rem
            }
            .mr-4 {
                margin-right: 1rem
            }
            .mt-8 {
                margin-top: 2rem
            }
            .ml-auto {
                margin-left: auto
            }
            .max-w-6xl {
                max-width: 72rem
            }
            .min-h-screen {
                min-height: 100vh
            }
            .px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }
            .py-4 {
                padding-top: 1rem;
                padding-bottom: 1rem
            }
            .relative {
                position: relative
            }
            .top-0 {
                top: 0
            }
            .right-0 {
                right: 0
            }
            .text-center {
                text-align: center
            }
            .text-right {
                text-align: right
            }
            .text-white {
                color: #fff
            }
            .underline {
                text-decoration: underline
            }
            .hover\:underline:hover {
                text-decoration: underline
            }
            .cursor-pointer {
                cursor: pointer
            }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body class="antialiased">
        <div id="app" class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <h1>Laravel Employee Management</h1>
                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg p-6">
                    <example-component></example-component>
                    <button id="jqueryButton" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Click me (jQuery)</button>
                    <p id="jqueryMessage" class="mt-2 text-gray-700"></p>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('#jqueryButton').click(function() {
                    $('#jqueryMessage').text('Hello from jQuery!');
                });
            });
        </script>
    </body>
</html>
