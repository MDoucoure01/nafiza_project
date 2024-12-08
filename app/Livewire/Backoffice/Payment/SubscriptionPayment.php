<?php

namespace App\Livewire\Backoffice\Payment;

use App\Models\Transaction;
use Livewire\Component;

class SubscriptionPayment extends Component
{
    public $payments;

    public function mount(){
        $this->payments = Transaction::where('type', 'subscription')->get();
    }

    public function render()
    {
        return view('livewire.backoffice.payment.subscription-payment')->layout('layouts.app');
    }
}
