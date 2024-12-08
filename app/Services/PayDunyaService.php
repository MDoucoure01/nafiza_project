<?php
namespace App\Services;

use App\Models\Student;
use App\Models\Subscription;
use App\Models\Transaction;
use Paydunya\Setup;
use App\Traits\QrTrait;
use Paydunya\Checkout\CheckoutInvoice;
use Illuminate\Http\Request;

class PayDunyaService
{
    use QrTrait;

    public function __construct()
    {
        // Initialisation des informations de l'entreprise et des clés
        Setup::setMasterKey(config('paydunya.master_key'));
        Setup::setPrivateKey(config('paydunya.private_key'));
        Setup::setPublicKey(config('paydunya.public_key'));
        Setup::setToken(config('paydunya.token'));

        Setup::setMode(config('paydunya.mode')); // 'test' ou 'live'

        // Informations sur l'entreprise
        // Setup::setCompanyName(config('paydunya.company_name'));
        // Setup::setCompanyLogoUrl(config('paydunya.company_logo'));
        // Setup::setReturnUrl(url('/payment/success'));
        // Setup::setCancelUrl(url('/payment/cancel'));
    }

    public function createPayment($orderDescription, $amount, $userID)
    {
        // Initialiser la boutique
        $store = new \Paydunya\Checkout\Store();
        $store->setName("Naafiza"); // Obligatoire
        $store->setTagline("Fenêtre sur les connaissance divine !"); // Optionnel
        $store->setPhoneNumber("776623520"); // Optionnel
        $store->setPostalAddress("Tivaouane, Sénégal"); // Optionnel

        $invoice = new CheckoutInvoice();
        $invoice->addItem("Inscription à la session 2024 - 2025", 1, $amount, $amount, $orderDescription);
        $invoice->setTotalAmount($amount);
        $invoice->setReturnUrl(route('payment.success'));
        $invoice->setCancelUrl(route('payment.cancel'));
        $invoice->setDescription("Paiement pour inscription"); // Description

        // dd($invoice->create());
        if ($invoice->create()) {
            // Récupérer le token de transaction PayDunya
            $transactionToken = $invoice->token;

            $student = Student::where('user_id', $userID)->first();
            $subsription = Subscription::where('student_id', $student->id)->first();

            // Enregistrer la transaction dans la base de données avec le token
            $transaction = Transaction::create([
                'subscription_id' => $subsription->id,
                'transaction_token' => $transactionToken,
                'amount' => $amount,
                'date' => date('Y-m-d'),
                'status' => 'pending',
                'type' => 'subscription',
            ]);

            return $invoice->getInvoiceUrl(); // URL vers la page de paiement
        } else {
            // dd($invoice->response_text.' - '.$invoice->response_code);
            return false;
        }
    }

    public function confirmPayment($token)
    {
        // dd($token);
        // Vérification du paiement après le retour de PayDunya
        $invoice = new CheckoutInvoice();
        if ($invoice->confirm($token)) {
            // Récupérer la transaction correspondante à partir du token
            $transaction = Transaction::where('transaction_token', $token)->first();

            if ($transaction) {
                // Mettre à jour le statut de la transaction
                $transaction->update([
                    'status' => 'completed',
                ]);

                $subscription = Subscription::where('id', $transaction->subscription_id)->first();
                $subscription->update([
                    'is_active' => 1,
                ]);

                $student = Student::where('id', $subscription->student->id)->first();
                $studentQR = $this->createQR(request(), $student);

                // Activer l'inscription de l'étudiant ou faire les actions nécessaires
                // Ex: $student = Student::find($transaction->user_id);
                // $student->activate();

                return redirect()->route('home')->with('success', 'Paiement réussi et inscription activée.');
                // return $invoice->getStatus(); // Statut du paiement
            }
        }

        return false;
    }
}
