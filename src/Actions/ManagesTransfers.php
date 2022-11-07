<?php

namespace Stephenjude\BlocPhpSdk\Actions;

use Stephenjude\BlocPhpSdk\Resources\CollectionAccount;
use Stephenjude\BlocPhpSdk\Resources\CronCheck;
use Stephenjude\BlocPhpSdk\Resources\Transfer;

trait ManagesTransfers
{

    public function transferFromOrgBalance()
    {
        $transfer = $this->post("accounts/collections");

        return new Transfer($transfer, $this);
    }

    public function createSimpleCronCheck(
        int $siteId,
        string $name,
        int $frequencyInMinutes,
        int $graceTimeInMinutes,
        $description
    ): CronCheck {
        $attributes = $this->post("sites/{$siteId}/cron-checks", [
            'name' => $name,
            'type' => 'simple',
            'frequency_in_minutes' => $frequencyInMinutes,
            'grace_time_in_minutes' => $graceTimeInMinutes,
            'description' => $description ?? '',
        ]);

        return new CronCheck($attributes, $this);
    }

    public function createCronCheck(
        int $siteId,
        string $name,
        string $cronExpression,
        int $graceTimeInMinutes,
        $description,
        string $serverTimezone
    ): CronCheck {
        $attributes = $this->post("sites/{$siteId}/cron-checks", [
            'name' => $name,
            'type' => 'cron',
            'cron_expression' => $cronExpression,
            'grace_time_in_minutes' => $graceTimeInMinutes,
            'description' => $description ?? '',
            'server_timezone' => $serverTimezone,
        ]);

        return new CronCheck($attributes, $this);
    }

    public function updateCronCheck(int $cronCheckId, array $payload): CronCheck
    {
        $attributes = $this->put("cron-checks/{$cronCheckId}", $payload);

        return new CronCheck($attributes, $this);
    }

    public function deleteCronCheck(int $cronCheckId): void
    {
        $this->delete("cron-checks/{$cronCheckId}");
    }

    public function syncCronChecks(int $siteId, array $cronCheckAttributes): array
    {
        $response = $this->post("sites/{$siteId}/cron-checks/sync", ['cron_checks' => $cronCheckAttributes]);

        return $this->transformCollection(
            $response,
            CronCheck::class,
        );
    }
}
