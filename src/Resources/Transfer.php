<?php

namespace Stephenjude\BlocPhpSdk\Resources;

class Transfer extends ApiResource
{
    public string $transactionId;

    public string $reference;

    public int $amount;

    public string $narration;

    public string $currency;

    public string $status;

    public string $createAt;

}
