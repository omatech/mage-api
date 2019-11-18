<?php

namespace Omatech\Mage\Api\Tests;

class TestTest extends BaseTestCase
{
    public function testTestMethodFromTestRoute()
    {
        $response = $this->get(route('test.testMethod'));
        $response->assertStatus(200);
    }
}
