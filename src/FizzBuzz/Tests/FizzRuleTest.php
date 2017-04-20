<?php

namespace FizzBuzz\Tests;

use FizzBuzz\FizzRule;

class FizzRuleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @dataProvider fizzNumbersProvider
     */
    public function itShouldReturnTrueIfDivisibleByThree($value, $expected)
    {
        $fizzRule = new FizzRule();
        $this->assertEquals($expected, $fizzRule->match($value));
    }

    /**
     * @return array
     */
    public function fizzNumbersProvider()
    {
        return [
            [3, true],
            [9, true],
            [12, true],
            [15, true],
            [18, true],
        ];
    }
}
