<?php

/**
 * General function that flashes message to the session.
 *
 * @param null $title
 * @param null $message
 * @return \Illuminate\Foundation\Application|mixed
 */
function flash($title = null, $message = null)
{
    $flash = app(\App\Http\Flash::class);
    if (func_num_args() == 0) {
        return $flash;
    }
    return $flash->info($title, $message);
}

/**
 * App name.
 */
function appName()
{
    return strtoupper(config('app.name'));
}