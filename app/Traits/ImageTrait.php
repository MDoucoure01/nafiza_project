<?php

namespace App\Traits;


trait ImageTrait
{
    protected function load($request)
    {
<<<<<<< HEAD
        return $request->file('profile')->store('public/images');
=======
        return $request->file('media_link')->store('public/images');
>>>>>>> bcc3e1df25726a20f9ea9081bc5085bd70630e9d
    }

    protected function loadCovered($request)
    {
        return $request->file('covered')->store('public/images');
    }
}
