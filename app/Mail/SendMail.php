<?php

namespace App\Mail;

use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Cart;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $bill;
    public $bill_detail;
    public $cart;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Bill $bill, BillDetail $bill_detail, Cart $cart)
    {
        $this->bill = $bill;
        $this->bill_detail = $bill_detail;
        $this->cart = $cart;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('example@example.com', 'Example')->view('mails.mail');
    }
}
