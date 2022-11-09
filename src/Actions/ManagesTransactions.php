<?php

namespace Stephenjude\BlocHqPhpSdk\Actions;

use Stephenjude\BlocHqPhpSdk\Resources\Transaction;

trait ManagesTransactions
{
    public function getAllTransactions(): array
    {
        $transactions = $this->get("transactions");

        return $this->transformCollection(
            collection:$transactions['data'],
            class:Transaction::class,
        );
    }

    public function getTransactionById(string $transactionId): Transaction
    {
        $transaction = $this->get("transactions/$transactionId");

        return new Transaction($transaction['data'], $this);
    }

    public function getTransactionByReference(string $transactionReference): Transaction
    {
        $transaction = $this->get("transactions/reference/$transactionReference");

        return new Transaction($transaction['data'], $this);
    }
}
