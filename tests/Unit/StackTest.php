<?php

use PHPUnit\Framework\TestCase;

class StackTest extends TestCase
{
    /**
     * @test
     */
    public function testTrueIsEqualTrue(){
        $this->assertEquals(true, true);
    }
}