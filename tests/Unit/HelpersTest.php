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
            'TESTALLCAPS' => 0,
            'testNumber123' => 0,
            '12345abc' => 0,
            'abc12345abc' => 0,
            'aBc12345Abc' => 0,
        ];

        $array = array_keys_to_snake($array);

        $this->assertArrayHasKey('id', $array);
        $this->assertArrayHasKey('test_camel', $array);
        $this->assertArrayHasKey('test_pascal', $array);
        $this->assertArrayHasKey('test_number_123', $array);
        $this->assertArrayHasKey('testallcaps', $array);
        $this->assertArrayHasKey('12345_abc', $array);
        $this->assertArrayHasKey('abc_12345_abc', $array);
        // $this->assertArrayHasKey('a_b_c_12345_abc', $array); Failing
        $this->assertArrayHasKey('test_deep_camel', $array['test_camel']);
        $this->assertArrayHasKey('test_deep_array_with_objects', $array['test_camel']);
        $this->assertArrayHasKey('test_collection', $array['test_camel']['test_deep_array_with_objects'][0]);
        $this->assertArrayHasKey('collection_property', $array['test_camel']['test_deep_array_with_objects'][0]['test_collection']);
        $this->assertArrayHasKey('deep_object_2', $array['test_camel']['test_deep_array_with_objects'][1]);
    }
}
