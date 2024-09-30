<?php

namespace App\Traits;

use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

trait QrTrait
{
    public function createQR($request, $student): void
    {
        // Générer le QR Code
        $qrUrl = env('APP_URL').'/pensionnaire/pointage?id='.$student->id;
        $qrCode = QrCode::encoding("UTF-8")
                        ->color(28, 30, 33)
                        ->backgroundColor(250, 183, 53)
                        ->format('png')
                        ->size(300)
                        ->generate($qrUrl);

        // Enregistrer le QR Code en tant qu'image
        $qrpath = 'qrcodes/' . Str::slug($request->firstname.' '.$request->lastname.' '.rand(min: 0, max: 99999)) . '.png';
        \Storage::disk('public')->put($qrpath, $qrCode);

        $student = Student::findOrFail($student->id);
        $student->code_qr = $qrpath;
        $student->save();
    }
}
