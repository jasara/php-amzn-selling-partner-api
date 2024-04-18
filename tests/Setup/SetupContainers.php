<?php

namespace Jasara\AmznSPA\Tests\Setup;

use Illuminate\Support\Str;
use Jasara\AmznSPA\Data\Schemas\Shipping\ContainerListSchema;
use Jasara\AmznSPA\Data\Schemas\Shipping\ContainerSchema;

trait SetupContainers
{
    public function setupContainers(): ContainerListSchema
    {
        return ContainerListSchema::make([
            ContainerSchema::from([
                'container_type' => 'PACKAGE',
                'container_reference_id' => Str::random(),
                'value' => [
                    'unit' => 'USD',
                    'value' => 29.98,
                ],
                'dimensions' => [
                    'height' => 12,
                    'length' => 36,
                    'width' => 15,
                    'unit' => 'CM',
                ],
                'items' => [
                    'item' => [
                        'title' => Str::random(),
                        'quantity' => 2,
                        'unit_price' => [
                            'unit' => 'USD',
                            'value' => 14.99,
                        ],
                        'unit_weight' => [
                            'unit' => 'lb',
                            'value' => 0.08164656,
                        ],
                    ],
                ],
                'weight' => [
                    'unit' => 'lb',
                    'value' => 0.08164656,
                ],
            ]),
        ]);
    }
}
