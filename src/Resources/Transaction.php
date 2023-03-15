<?php

namespace Stephenjude\BlocHqPhpSdk\Resources;

class Transaction extends ApiResource
{
    public string $transactionId;

    public string $createdAt;

    public string $source;

    public string $updatedAt;

    public int $amount;

    public string $reference;

    public string $status;

    public string $currency;

    public string $environment;

    public int $previousAccountBalance;

    public string $drcr;

    public string $organizationId;

    public string $accountId;

    public ?array $metaData;

    public bool $reversal;

    public string $paymentMethod;

    public int $currentAccountBalance;
}
