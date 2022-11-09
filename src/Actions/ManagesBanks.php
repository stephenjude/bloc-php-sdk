<?php

namespace Stephenjude\BlocPhpSdk\Actions;

use Stephenjude\BlocPhpSdk\Resources\Account;
use Stephenjude\BlocPhpSdk\Resources\Bank;
use Stephenjude\BlocPhpSdk\Resources\BankAccount;
use Stephenjude\BlocPhpSdk\Resources\CollectionAccount;
use Stephenjude\BlocPhpSdk\Resources\Transaction;

trait ManagesBanks
{
    public function getBankList(): array
    {
        $banks = $this->get("banks");

        return $this->transformCollection(
            collection: $banks['data'],
            class: Bank::class,
        );
    }

    public function resolveBankAccount(string $accountNumber, string $bankCode): BankAccount
    {
        $bankAccount = $this->get("resolve-account?account_number=$accountNumber&bank_code=$bankCode");

        return new BankAccount($bankAccount, $this);
    }
}
