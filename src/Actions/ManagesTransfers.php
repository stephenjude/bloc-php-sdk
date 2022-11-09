<?php

namespace Stephenjude\BlocHqPhpSdk\Actions;

use Stephenjude\BlocHqPhpSdk\Resources\Transfer;

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

        return new Transfer($transfer['data'], $this);
    }
}
