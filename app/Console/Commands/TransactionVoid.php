<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TransactionVoid extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transaksi:void';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Void transaksi yang belum dibayar setelah batas waktu tertentu';

    /**
     * Execute the console command to void unpaid transactions.
     *
     * This command fetches all transactions with a status of 'unpaid' and a void_at
     * timestamp less than or equal to the current time. It then updates these transactions
     * to have a status of 'void'.
     *
     * @return int
     */
    public function handle()
    {
        // Retrieve transactions that are unpaid and past their void_at time
        $voidTransactions = \App\Models\Transaction::where('payment_status', 'unpaid')
            ->where('void_at', '<=', now())
            ->get();

        // Loop through each transaction and update its status to 'void'
        foreach ($voidTransactions as $transaction) {
            $update = \App\Models\Transaction::where('id', $transaction->id)->update([
                'payment_status' => 'void'
            ]);

            // Output information about the transaction being voided
            $this->info("Transaksi ID {$transaction->id} di-void.");

            // If the update failed, output an error message
            if (!$update) {
                $this->error("Gagal meng-update transaksi ID {$transaction->id}.");
            }
        }

        // Return exit code 0 (success)
        return 0;
    }
}
