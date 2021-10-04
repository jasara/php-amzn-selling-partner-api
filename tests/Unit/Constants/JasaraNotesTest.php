<?php

namespace Jasara\AmznSPA\Tests\Unit\Constants;

use Illuminate\Support\Str;
use Jasara\AmznSPA\Constants\JasaraNotes;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

/**
 * @covers \Jasara\AmznSPA\Constants\JasaraNotes
 */
class JasaraNotesTest extends UnitTestCase
{
    public function testGetNote()
    {
        $error = 'The application isn\u0027t configured with roles.';
        $result = JasaraNotes::findNote($error);

        $this->assertIsString($result);
        $this->assertStringContainsString('approved but not published', $result);

        $error = 'The application isn\'t configured with roles.';
        $result = JasaraNotes::findNote($error);

        $this->assertIsString($result);
        $this->assertStringContainsString('approved but not published', $result);
    }

    public function testGetNull()
    {
        $error = Str::random();
        $result = JasaraNotes::findNote($error);

        $this->assertNull($result);
    }
}
