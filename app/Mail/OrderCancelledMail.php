<?php

namespace App\Mail;

use App\Models\Admin\Order as AdminOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCancelledMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    public function __construct(AdminOrder $order)
    {
        $this->order = $order;
    }

    public function build()
    {
        return $this->subject('Order Cancellation Notice ')
                    ->view('admin.order.order_cancelled_email');
    }
}
