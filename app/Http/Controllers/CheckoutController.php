<?php

namespace App\Http\Controllers;

use Exception;
use Midtrans\Snap;
use App\Models\Cart;
use Midtrans\Config;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        // Save data user
        $user = Auth::user();
        $user->update($request->except("total_price"));

        // Proses checkout
        $code = "STORE-" . mt_rand(00000, 99909);
        $carts = Cart::with(["product", "user"])
            ->where("users_id", Auth::user()->id)
            ->get();

        // Transaction create
        $transaction = Transaction::create([
            "users_id" => Auth::user()->id,
            "insurance_price" => 0,
            "shipping_price" => 0,
            "total_price" => $request->total_price,
            "transaction_status" => "PENDING",
            "code" => $code,
        ]);

        foreach ($carts as $cart) {
            $trx = "TRX-" . mt_rand(00000, 99999);

            TransactionDetail::create([
                "transaction_id" => $transaction->id,
                "products_id" => $cart->product->id,
                "price" => $cart->product->price,
                "shipping_status" => "PENDING",
                "resi" => "",
                "code" => $trx,
            ]);
        }

        // Delete cart data
        Cart::where("users_id", Auth::user()->id)->delete();

        // Konfigurasi Midtrans
        Config::$serverKey = config("services.midtrans.serverKey");
        Config::$isProduction = config("services.midtrans.isProduction");
        Config::$isSanitized = config("services.midtrans.isSanitized");
        Config::$is3ds = config("services.midtrans.is3ds");

        // Buat Array untuk dikirim ke midtrans
        $midtrans = [
            "transaction_details" => [
                "order_id" => $code,
                "gross_amount" => (int) $request->total_price,
            ],
            "customer_details" => [
                "first_name" => Auth::user()->name,
                "email" => Auth::user()->email,
            ],
            "enabled_payments" => ["gopay", "permata_va", "bank_transfer"],
            "vtweb" => [],
        ];

        try {
            // Get Snap Payment Page URL
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;

            // Redirect to Snap Payment Page
            return redirect($paymentUrl);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function callback(Request $request)
    {
        //
    }
}
