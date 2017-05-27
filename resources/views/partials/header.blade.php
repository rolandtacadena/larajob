<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ appName() }}</title>
    <link rel="stylesheet" href="{{ asset('css/vendor/foundation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/sweetalert.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

</head>
<body>
    <div class="off-canvas-wrapper">
        <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
            <div class="title-bar" data-responsive-toggle="main-menu" data-hide-for="medium">

                <div class="title-bar-left">
                    <button class="menu-icon" type="button" data-open="offCanvasLeft"></button>
                    <span class="title-bar-title"><a href="">{{ appName() }}</a></span>
                </div>

                 <div class="title-bar-right">
                    <span class="title-bar-title">Login</span>
                    <button class="menu-icon" type="button" data-open="offCanvasRight"></button>
                </div>

            </div>

            <div class="off-canvas position-left" id="offCanvasLeft" data-off-canvas>
                <ul class="vertical dropdown menu" data-dropdown-menu>
                    <li><a href="/projects">Projects</a></li>
                    <li><a href="/blog">Blog</a></li>
                    <li><a href="/blog">Contact</a></li>
                    <li><a href="/newsletter">NewsLetter</a></li>
                </ul>
            </div>

            <div class="off-canvas position-right" id="offCanvasRight" data-off-canvas data-position="right">
			    <ul class="vertical dropdown menu" data-dropdown-menu>
			        <li><a href="right_item_1">Right item 1</a></li>
			        <li><a href="right_item_2">Right item 2</a></li>
			        <li><a href="right_item_3">Right item 3</a></li>
			    </ul>
			</div>

            <div id="main-menu" class="top-bar">

               <div class="row">

                   <div class="top-bar-left">
                        <ul class="dropdown menu" data-dropdown-menu>
                            <li><a href="/">{{ appName() }}</a></li>
                        </ul>
                    </div>

                    <div class="top-bar-right">
					    <ul class="dropdown menu" data-dropdown-menu>
				            <li><a href="{{ route('about') }}">About</a></li>

                            @if($isAuthenticated)

                                <li>
                                    <a href="{{ route('employer-edit-profile', $authUser) }}">
                                        {{ $authUser->name }}
                                    </a>
                                </li>

                                <li class="logout-button">
                                    <form method="POST" action="/logout">
                                        {{ csrf_field() }}
                                        <button type="submit">Logout</button>
                                    </form>
                                </li>

                            @endif

                            <li><a href="{{ route('create-job') }}">Post a Job</a></li>

                        </ul>
					</div>

               </div>

            </div>

            <div class="off-canvas-content" data-off-canvas-content>
                <div class="row columns">