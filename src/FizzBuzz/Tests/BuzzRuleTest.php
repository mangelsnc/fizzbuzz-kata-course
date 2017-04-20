<?php

namespace FizzBuzz\Tests;

use FizzBuzz\BuzzRule;

class BuzzRuleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @dataProvider buzzNumbersProvider
     */
    public function itShouldReturnTrueIfDivisibleByFive($value, $expected)
    {
        $buzzRule = new BuzzRule();
        $this->assertEquals($expected, $buzzRule->match($value));
    }

    /**
     * @return array
     */
    public function buzzNumbersProvider()
    {
        return [
            [5, true],
            [10, true],
            [15, true],
            [20, true],
            [25, true],
        ];
    }
}
