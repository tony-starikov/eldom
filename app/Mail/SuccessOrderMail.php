<?php

namespace App\Mail;

use App\Order;
use App\Requisite;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SuccessOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var Order
     */
    public $order;

    /**
     * The requisite instance.
     *
     * @var Requisite
     */
    public $requisite;

    /**
     * Create a new message instance.
     *
     * @param  Order  $order
     * @param  Requisite  $requisite
     * @return void
     */
    public function __construct(Order $order, Requisite $requisite)
    {
        $this->order = $order;
        $this->requisite = $requisite;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('administrator@electro-dom.od.ua', 'Electro-dom.od.ua')
                    ->subject('Electro-dom.od.ua')
                    ->view('email.successOrder');
    }
}
