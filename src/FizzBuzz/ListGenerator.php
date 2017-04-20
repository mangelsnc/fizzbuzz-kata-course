<?php
namespace FizzBuzz;

/**
 * Class ListGenerator
 */
class ListGenerator
{
    const TOTAL_ITEMS = 100;
    private $rules = [];

    public function addRule(RuleInterface $rule)
    {
        $this->rules[$rule->getPriority()][] = $rule;
        ksort($this->rules);
        
        return $this;
    }

    public function getRules()
    {
        return $this->rules;
    }

    public function getReplacement($value)
    {
        foreach ($this->rules as $ruleSet) {
            foreach ($ruleSet as $rule) {
                if ($rule->match($value)) {
                    return $rule->getReplacement();
                }
            }
        }

        return $value;
    }

    public function getList()
    {
        for ($number=1; $number<=self::TOTAL_ITEMS; $number++) {
            echo $this->getReplacement($number);
            echo "\n";
        }
    }
}
