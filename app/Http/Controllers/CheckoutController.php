<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Stripe\Stripe;

use Stripe\Checkout\Session as StripeSession;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $cart = session('cart');

        if (!$cart) {
            return redirect('/shop');
        }

        // Set Stripe secret key
        Stripe::setApiKey(config('services.stripe.secret'));

        $items = [];
        foreach ($cart as $item) {
            $items[] = [
                'price_data' => [
                    'currency' => 'bdt', // or 'usd' for testing
                    'product_data' => ['name' => $item['name']],
                    'unit_amount' => $item['price'] * 100,
                ],
                'quantity' => $item['quantity'],
            ];
        }

        $session = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => $items,
            'mode' => 'payment',
            'success_url' => route('checkout.success'),
            'cancel_url' => route('cart'),
        ]);

        return redirect($session->url);
    }

    public function success()
    {
        $cart = session('cart');

        if (!$cart) {
            return redirect('/shop');
        }

        $total = collect($cart)->sum(fn($i) => $i['price'] * $i['quantity']);

        $order = Order::create([
            'user_id'     => auth()->id(), // null if guest
            'total_price' => $total,
            'status'      => 'paid'
        ]);

        foreach ($cart as $id => $item) {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $id,
                'quantity'   => $item['quantity'],
                'unit_price' => $item['price']
            ]);
        }

        session()->forget('cart');

        return redirect()->route('order.success', ['order' => $order->id])
            ->with('success', 'Order placed successfully!');


        // Redirect based on login status
        // if (auth()->check()) {
        //     return redirect('/my-orders')->with('success', 'Order placed successfully!');
        // } else {
        //     return redirect()->route('order.success')->with('success', 'Order placed successfully!');
        // }
    }



    public function invoice(Order $order)
    {
        // Load order with items
        $order->load('items.product');

        // Generate PDF from a Blade view
        $pdf = Pdf::loadView('invoices.order', compact('order'));

        // Download as file
        return $pdf->download('invoice-order-' . $order->id . '.pdf');
    }
}
