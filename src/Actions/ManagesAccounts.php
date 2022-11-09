<?php

namespace Stephenjude\BlocHqPhpSdk\Actions;

use Stephenjude\BlocHqPhpSdk\Resources\CollectionAccount;

trait ManagesAccounts
{
    public function createCollectionAccount(): CollectionAccount
    {
        $account = $this->post("accounts/collections");

        return new CollectionAccount($account['data'], $this);
    }
}
