<?php

namespace App\Livewire\Backoffice\Payment;

use Livewire\Component;

class PaymentInitial extends Component
{
    public function render()
    {
        return view('livewire.backoffice.payment.payment-initial')->layout('layouts.guest');
    }
}
