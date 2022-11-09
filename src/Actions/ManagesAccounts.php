<?php

namespace Stephenjude\BlocPhpSdk\Actions;

use Stephenjude\BlocPhpSdk\Resources\CollectionAccount;

trait ManagesAccounts
{
    public function createCollectionAccount(): CollectionAccount
    {
        $account = $this->post("accounts/collections");

        return new CollectionAccount($account['data'], $this);
    }
}
