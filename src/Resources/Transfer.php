<?php

namespace Stephenjude\BlocHqPhpSdk\Resources;

class Transfer extends ApiResource
{
    public string $reference;

    public string $accountId;

    public int $amount;

    public string $narration;

    public string $recipientAccountNumber;

    public string $recipientAccountName;

    public string $currency;

    public string $status;

    public string $createAt;
}
