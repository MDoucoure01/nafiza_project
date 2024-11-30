<?php
namespace App\Services;

use Paydunya\Setup;
use Paydunya\Checkout\CheckoutInvoice;

class PayDunyaService
{
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

    public function createPayment($orderDescription, $amount)
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
            return $invoice->getInvoiceUrl(); // URL vers la page de paiement
        } else {
            dd($invoice->response_text.' - '.$invoice->response_code);
        }
    }

    public function confirmPayment($token)
    {
        // Vérification du paiement après le retour de PayDunya
        $invoice = new CheckoutInvoice();
        if ($invoice->confirm($token)) {
            return $invoice->getStatus(); // Statut du paiement
        }

        return false;
    }
}
