<?php

namespace App\Livewire\Backoffice\Payment;

use Livewire\Component;

class MonthlyPaymentRegister extends Component
{
    public function render()
    {
        return view('livewire.backoffice.payment.monthly-payment-register')->layout('layouts.app');
    }
}
