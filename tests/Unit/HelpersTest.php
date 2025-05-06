<?php

namespace Jasara\AmznSPA\Tests\Unit;

use ArrayObject;
use PHPUnit\Framework\Attributes\CoversFunction;

#[CoversFunction('array_keys_to_snake')]
#[CoversFunction('deep_array_conversion')]
class HelpersTest extends UnitTestCase
{
    public function testArrayKeysToSnake()
    {
        $array = [
            'ID' => 0,
            'testCamel' => [
                'testDeepCamel' => 0,
                'testDeepArrayWithObjects' => [
                    collect(['testCollection' => [
                        'collectionProperty' => 0,
                    ]]),
                    [
                        'deepObject2' => 0,
                    ],
                ],
            ],
            'TestPascal' => 0,
            'TESTALLCAPS' => 0,
            'testNumber123' => 0,
            '12345abc' => 0,
            'abc12345abc' => 0,
            'aBc12345Abc' => 0,
            'SKUInboundGuidanceList' => 0,
            'fnSku' => 0,
        ];

        $array = array_keys_to_snake($array);

        $this->assertArrayHasKey('id', $array);
        $this->assertArrayHasKey('test_camel', $array);
        $this->assertArrayHasKey('test_pascal', $array);
        $this->assertArrayHasKey('test_number_123', $array);
        $this->assertArrayHasKey('testallcaps', $array);
        $this->assertArrayHasKey('12345_abc', $array);
        $this->assertArrayHasKey('abc_12345_abc', $array);
        $this->assertArrayHasKey('a_bc_12345_abc', $array);
        $this->assertArrayHasKey('sku_inbound_guidance_list', $array);
        $this->assertArrayHasKey('fnsku', $array);
        $this->assertArrayHasKey('test_deep_camel', $array['test_camel']);
        $this->assertArrayHasKey('test_deep_array_with_objects', $array['test_camel']);
        $this->assertArrayHasKey('test_collection', $array['test_camel']['test_deep_array_with_objects'][0]);
        $this->assertArrayHasKey('collection_property', $array['test_camel']['test_deep_array_with_objects'][0]['test_collection']);
        $this->assertArrayHasKey('deep_object_2', $array['test_camel']['test_deep_array_with_objects'][1]);
    }

    public function testDeepArrayConversion():void
    {
        $source = new ArrayObject([
            'level1' => '1',
            'level2' => new ArrayObject([
                'level3' => '3',
                'level4' => new ArrayObject([
                    'level5' => '5',
                ]),
            ]),
        ]);

        $target = deep_array_conversion($source);

        $this->assertEquals('1', $target['level1']);
        $this->assertIsArray($target['level2']);
        $this->assertEquals('3', $target['level2']['level3']);
        $this->assertIsArray($target['level2']['level4']);
        $this->assertEquals('5', $target['level2']['level4']['level5']);
    }
}
