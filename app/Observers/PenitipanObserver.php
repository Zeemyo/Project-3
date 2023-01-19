<?php

namespace App\Observers;

use App\Models\{Penitipan, Transaksi};
use Illuminate\Support\Facades\Log;
use App\Helpers\MidtransHelper;
use Illuminate\Support\Facades\DB;
use Throwable;

class OrderObserver
{
    /**
     * Handle the penitipan "created" event.
     *
     * @param  \App\Penitipan  $penitipan
     * @return void
     */
    public function created(Penitipan $penitipan)
    {
        DB::beginTransaction();
        try {

            // Create Penitipan in Midtrans
            $params = [
                'json' => [
                    'payment_type' => 'bank_transfer',
                    'bank_transfer' => json_decode(json_encode(["bank" => "bni"])),
                    'transaction_details' => json_decode(json_encode(["id_penitipan" => time(), "gross_amount" => 10000 + $penitipan->extra_fee])),
                ]
            ];

            $transaction = MidtransHelper::createTransaction($params);

            $save_transaction = new Transaksi;
            $save_transaction->midtrans_transaction_id = $transaction->transaction_id;
            $save_transaction->midtrans_order_id = $transaction->id_penitipan;
            $save_transaction->midtrans_va_number = $transaction->va_numbers[0]->va_number;
            $save_transaction->total = $transaction->gross_amount;
            $save_transaction->id_penitipan = $penitipan->id;
            $save_transaction->save();

            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
        }
    }
}
