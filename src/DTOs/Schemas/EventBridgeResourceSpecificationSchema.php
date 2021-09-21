<?php

namespace Jasara\AmznSPA\DTOs\Schemas;

use Spatie\DataTransferObject\DataTransferObject;

class EventBridgeResourceSpecificationSchema extends DataTransferObject
{
    public string $region;

    public string $account_id;

    public function toArray(): array
    {
        return [
            'region' => $this->region,
            'accountId' => $this->account_id,
        ];
    }
}
