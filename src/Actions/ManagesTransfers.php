<?php

namespace Stephenjude\BlocPhpSdk\Actions;

use Stephenjude\BlocPhpSdk\Resources\CollectionAccount;
use Stephenjude\BlocPhpSdk\Resources\CronCheck;
use Stephenjude\BlocPhpSdk\Resources\Transfer;

trait ManagesTransfers
{

    public function transferFromOrgBalance(
        int $amount,
        string $accountNumber,
        string $bankCode,
        string $narration,
        array $metaData = [],
    ) {
        $transfer = $this->post("transfers/balance", [
            'amount' => $amount,
            'accountNumber' => $accountNumber,
            'bankCode' => $bankCode,
            'narration' => $narration,
            'metaData' => $metaData,
        ]);

        return new Transfer($transfer, $this);
    }
}
