<?php

namespace Jasara\AmznSPA\Unit;

use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

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
            'testNumber123' => 0,
            'TESTALLCAPS' => 0,
        ];

        $array = array_keys_to_snake($array);

        $this->assertArrayHasKey('id', $array);
        $this->assertArrayHasKey('test_camel', $array);
        $this->assertArrayHasKey('test_pascal', $array);
        $this->assertArrayHasKey('test_number123', $array);
        $this->assertArrayHasKey('testallcaps', $array);
        $this->assertArrayHasKey('test_deep_camel', $array['test_camel']);
        $this->assertArrayHasKey('test_deep_array_with_objects', $array['test_camel']);
        $this->assertArrayHasKey('test_collection', $array['test_camel']['test_deep_array_with_objects'][0]);
        $this->assertArrayHasKey('collection_property', $array['test_camel']['test_deep_array_with_objects'][0]['test_collection']);
        $this->assertArrayHasKey('deep_object2', $array['test_camel']['test_deep_array_with_objects'][1]);
    }
}
