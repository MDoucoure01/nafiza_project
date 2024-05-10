<?php

namespace App\Traits;


trait ImageTrait
{
    protected function load($request)
    {
        return $request->file('media_link')->store('public/images');
    }
}

