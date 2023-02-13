<?php

namespace Stephenjude\BlocHqPhpSdk\Actions;

use Stephenjude\BlocHqPhpSdk\Resources\Account;
use Stephenjude\BlocHqPhpSdk\Resources\CollectionAccount;

trait ManagesAccounts
{
    public function createCollectionAccount(): CollectionAccount
    {
        $account = $this->post("accounts/collections");

        return new CollectionAccount($account['data'], $this);
    }

    public function getAccountById(string $id): Account
    {
        $account = $this->get("accounts/$id");

        return new Account($account['data'], $this);
    }

    public function getAccountByAccountNumber(string $accountNumber): Account
    {
        $account = $this->get("accounts/number/$accountNumber");

        return new Account($account['data'], $this);
    }
}
