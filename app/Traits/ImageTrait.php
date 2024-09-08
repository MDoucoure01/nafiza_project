<?php

namespace App\Traits;


trait ImageTrait
{
    protected function load($request)
    {
        return $request->file('image')->store('public/images');
    }

    protected function loadCovered($request)
    {
        return $request->file('covered')->store('public/images');
    }

    public function loadFile($request){
        return $request->file('file')->store('public/files');
    }
}
