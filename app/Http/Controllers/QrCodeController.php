<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

class QrCodeController extends Controller
{
    public function generate(Request $request)
    {
        $url = $request->query('url', 'https://pay.wave.com/m/M_QIKlqn4fuMS7/c/sn/?amount=25000');

        $rendererStyle = new RendererStyle(300, 0);

        $renderer = new ImageRenderer(
            $rendererStyle,
            new SvgImageBackEnd()
        );

        $writer = new Writer($renderer);
        $qrCode = $writer->writeString($url);

        return response($qrCode)
            ->header('Content-Type', 'image/svg+xml');
    }
}
