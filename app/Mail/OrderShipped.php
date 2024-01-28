<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;


class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    public  $orderId;
    public function __construct($id)
    {
        $this->orderId = $id;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Order Shipped',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $id = $this->orderId;
        $bookings = DB::table('orders')
            ->where('orders.id', '=', $id)
            ->join('listings', 'listings.id', 'orders.listing_id')
            ->select('orders.*', 'listings.nameuz as listingname')->first();

        $foods = DB::table('order_items')->where('order_items.order_id', '=', $id)
            ->join('food_types', 'food_types.id', 'order_items.food_id')
            ->select('order_items.*', 'food_types.nameen as foodname', 'food_types.price')->get();

        return new Content(
            view: 'invioce',
            with: ['book'=>$bookings, 'foods' => $foods]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
