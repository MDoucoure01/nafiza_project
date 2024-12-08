<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Services\PayDunyaService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $payDunyaService;

    public function __construct(PayDunyaService $payDunyaService)
    {
        $this->payDunyaService = $payDunyaService;
    }

    public function initiatePayment()
    {
        // Montant de l'inscription
//        $amount = 20000; // Exemple, à personnaliser
        $amount = 200; // Exemple, à personnaliser
        $orderDescription = "Paiement pour l'inscription scolaire";
        $userID = request()->user_id;

        // Créer la transaction de paiement
        $paymentUrl = $this->payDunyaService->createPayment($orderDescription, $amount, $userID);

        if ($paymentUrl) {
            // Redirection vers la page de paiement
            return redirect($paymentUrl);
        } else {
            return back()->with('error', 'Erreur lors de la création du paiement.');
        }
    }

    public function paymentSuccess(Request $request)
    {
        // Récupérer le token du paiement
        $token = $request->input('token');

        $status = $this->payDunyaService->confirmPayment($token);

        if ($status == "completed") {
            // Le paiement a réussi
            return redirect()->away(env('PAYMENT_SUCCESS_REDIRECTION_URL'));
        } else {
            // Paiement échoué ou en attente
            return redirect()->away(env('PAYMENT_FAILED_REDIRECTION_URL'));
        }
    }

    public function paymentCancel()
    {
        return redirect()->away(env('PAYMENT_FAILED_REDIRECTION_URL'));
    }
}
