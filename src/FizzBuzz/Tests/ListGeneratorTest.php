<?php
namespace FizzBuzz\Tests;

use FizzBuzz\ListGenerator;
use FizzBuzz\FizzRule;
use FizzBuzz\BuzzRule;
use FizzBuzz\FizzBuzzRule;
use FizzBuzz\RuleInterface;

class ListGeneratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function itShouldAGroupRulesByPriority()
    {
        $ruleA = $this->getRuleMock();
        $ruleA->method('getPriority')->willReturn(1);

        $ruleB = $this->getRuleMock();
        $ruleB->method('getPriority')->willReturn(2);

        $ruleC = $this->getRuleMock();
        $ruleC->method('getPriority')->willReturn(2);

        $listGenerator = new ListGenerator();
        $listGenerator->addRule($ruleA);
        $listGenerator->addRule($ruleB);
        $listGenerator->addRule($ruleC);

        $this->assertEquals(2, count($listGenerator->getRules()));
    }

    /**
     * Get a Rule Mock
     *
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    private function getRuleMock()
    {
        $rule = $this->getMockBuilder(RuleInterface::class)
            ->setMethods(['getPriority', 'match', 'getReplacement'])
            ->getMock()
        ;

        return $rule;
    }

    /**
     * @test
     * @dataProvider listValuesProvider
     *
     * @param $value
     * @param $expected
     */
    public function itShouldGenerateTheCorrectReplacementForEachNumber($value, $expected)
    {
        $listGenerator = new ListGenerator();
        $listGenerator->addRule(new FizzRule());
        $listGenerator->addRule(new BuzzRule());
        $listGenerator->addRule(new FizzBuzzRule());

        $this->assertEquals($expected, $listGenerator->getReplacement($value));
    }

    /**
     * @return array
     */
    public function listValuesProvider()
    {
        return [
            [1, 1],
            [2, 2],
            [3, 'Fizz'],
            [4, 4],
            [5, 'Buzz'],
            [15, 'FizzBuzz'],
        ];
    }

    /**
     * @test
     */
    public function itShouldGetTheReplacementForEachValue()
    {
        $this->setOutputCallback(function() {});

        $ruleA = $this->getRuleMock();
        $ruleA->method('getPriority')->willReturn(1);
        $ruleA->expects($this->exactly(ListGenerator::TOTAL_ITEMS))->method('match');

        $ruleB = $this->getRuleMock();
        $ruleB->method('getPriority')->willReturn(2);
        $ruleB->expects($this->exactly(ListGenerator::TOTAL_ITEMS))->method('match');

        $ruleC = $this->getRuleMock();
        $ruleC->method('getPriority')->willReturn(2);
        $ruleC->expects($this->exactly(ListGenerator::TOTAL_ITEMS))->method('match');

        $listGenerator = new ListGenerator();
        $listGenerator->addRule($ruleA);
        $listGenerator->addRule($ruleB);
        $listGenerator->addRule($ruleC);

        $listGenerator->getList();
    }
}
