<?php

namespace Stephenjude\BlocHqPhpSdk\Actions;

use Stephenjude\BlocHqPhpSdk\Resources\Bank;
use Stephenjude\BlocHqPhpSdk\Resources\BankAccount;

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
