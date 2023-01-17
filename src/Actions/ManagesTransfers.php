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
    ): Transfer {
        $transfer = $this->post("transfers/balance", [
            'amount' => $amount,
            'account_number' => $accountNumber,
            'bank_code' => $bankCode,
            'narration' => $narration,
            'meta_data' => $metaData,
        ]);

        return new Transfer($transfer['data'], $this);
    }
}
