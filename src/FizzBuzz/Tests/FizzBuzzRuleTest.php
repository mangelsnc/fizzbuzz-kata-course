<?php

namespace FizzBuzz\Tests;

use FizzBuzz\FizzBuzzRule;

class FizzBuzzRuleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @dataProvider fizzBuzzNumbersProvider
     */
    public function itShouldReturnTrueIfDivisibleByThreeOrFive($value, $expected)
    {
        $fizzBuzzRule = new FizzBuzzRule();
        $this->assertEquals($expected, $fizzBuzzRule->match($value));
    }

    /**
     * @return array
     */
    public function fizzBuzzNumbersProvider()
    {
        return [
            [15, true],
            [30, true],
            [45, true],
            [60, true],
        ];
    }
}
