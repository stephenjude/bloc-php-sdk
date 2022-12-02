<?php

namespace Stephenjude\BlocHqPhpSdk\Resources;

class Account extends ApiResource
{
    public string $id;

    public string $name;

    public string $accountNumber;

    public string $bankName;

    public string $status;

    public string $environment;

    public string $organizationId;

    public string $balance;

    public string $currency;

    public string $metaData;

    public string $customerId;

    public string $collectionAccount;

    public string $hideAccount;

    public string $createdAt;

    public string $updatedAt;

    public function freeze(?string $reason = null): bool
    {
        $payload = array_filter(['reason' => $reason]);

        $response = $this->bloc->put("accounts/$this->id/freeze", $payload);

        return (bool) $response['success'];
    }

    public function unfreeze(?string $reason = null): bool
    {
        $payload = array_filter(['reason' => $reason]);

        $response = $this->bloc->put("accounts/$this->id/unfreeze", $payload);

        return (bool) $response['success'];
    }

    public function close(?string $reason = null): bool
    {
        $payload = array_filter(['reason' => $reason]);

        $response = $this->bloc->put("accounts/$this->id/close", $payload);

        return (bool) $response['success'];
    }

    public function reopen(?string $reason = null): bool
    {
        $payload = array_filter(['reason' => $reason]);

        $response = $this->bloc->put("accounts/$this->id/reopen", $payload);

        return (bool) $response['success'];
    }
}
