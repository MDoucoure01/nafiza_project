<?php

namespace App\Traits;


trait PdfTrait
{
    protected function loadPdf($request)
    {
        return $request->file('file')->store('public/pdf');
    }
}

