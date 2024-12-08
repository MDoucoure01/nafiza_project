<?php

namespace App\Livewire\Backoffice\Payment;

use App\Models\Transaction;
use Livewire\Component;

class MonthlyPayment extends Component
{
    public $payments;

    public function mount(){
        $this->payments = Transaction::where('type', 'monthly')->get();
    }

    public function render()
    {
        return view('livewire.backoffice.payment.monthly-payment')->layout('layouts.app');
    }
}
