<?php
/**
 * Created by PhpStorm.
 * User: GMG-Developer
 * Date: 18/10/2017
 * Time: 14:48
 */

namespace App\Libs;


use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionWallet;
use App\Models\User;
use Carbon\Carbon;
use Webpatser\Uuid\Uuid;

class TransactionUnit
{
    public static function createTransaction($userId, $cartId, $orderId){
        try{
            $cart = Cart::find($cartId);

            $user = User::find($userId);

            $dateTimeNow = Carbon::now('Asia/Jakarta');
            $invoice = Utilities::GenerateInvoice();
            $paymentMethodInt = 1;
            if($cart->payment_method == 'credit_card'){
                $paymentMethodInt = 2;
            }
            else if($cart->payment_method == 'wallet'){
                $walletTemp = (double)$user->getOriginal('wallet_amount');
                $user->wallet_amount = $walletTemp - (double)$cart->getOriginal('invest_amount');
                $user->save();

                $paymentMethodInt = 3;
            }

            $trxCreate = Transaction::create([
                'id'                => Uuid::generate(),
                'user_id'           => $userId,
                'invoice'           => $invoice,
                'product_id'           => $cart->product_id,
                'payment_method_id' => $paymentMethodInt,
                'order_id'          => $orderId,
                'total_payment'     => $cart->getOriginal('total_invest_amount'),
                'total_price'       => $cart->getOriginal('invest_amount'),
                'phone'             => $user->phone,
                'admin_fee'         => $cart->getOriginal('admin_fee'),
                'status_id'         => 3,
                'created_on'        => $dateTimeNow->toDateTimeString(),
                'created_by'        => $userId
            ]);

            // Delete cart
            $cart->delete();

            return true;
        }
        catch(\Exception $ex){
            Utilities::ExceptionLog($ex);
        }
    }

    public static function createTransactionTopUp($userId, $cartId, $orderId){
        try{
            $cart = Cart::find($cartId);

            $user = User::find($userId);

            $dateTimeNow = Carbon::now('Asia/Jakarta');

            $paymentMethodInt = 1;
            if($cart->payment_method == 'credit_card'){
                $paymentMethodInt = 2;
            }

            $trxCreate = TransactionWallet::create([
                'user_id'           => $userId,
                'payment_method_id' => $paymentMethodInt,
                'order_id'          => $orderId,
                'total_payment'     => $cart->getOriginal('total_invest_amount'),
                'amount'            => $cart->getOriginal('invest_amount'),
                'phone'             => $user->phone,
                'admin_fee'         => $cart->getOriginal('admin_fee'),
                'status_id'         => 16,
                'created_at'        => $dateTimeNow->toDateTimeString(),
                'created_by'        => $userId
            ]);

            // Delete cart
            $cart->delete();



            return true;
        }
        catch(\Exception $ex){
            Utilities::ExceptionLog($ex);
        }
    }
}