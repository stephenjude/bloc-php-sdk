<?php

namespace Stephenjude\BlocPhpSdk\Actions;

use Stephenjude\BlocPhpSdk\Resources\CollectionAccount;
use Stephenjude\BlocPhpSdk\Resources\CronCheck;
use Stephenjude\BlocPhpSdk\Resources\Transaction;
use Stephenjude\BlocPhpSdk\Resources\Transfer;

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
