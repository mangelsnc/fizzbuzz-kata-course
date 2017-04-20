<?php

namespace FizzBuzz;

class FizzRule implements RuleInterface
{
    const FACTOR = 3;
    const PRIORITY = 2;

    /**
     * @param $value
     * @return bool
     */
    public function match($value)
    {
        return 0 === $value % self::FACTOR;
    }

    /**
     * @return string
     */
    public function getReplacement()
    {
        return 'Fizz';
    }

    /**
     * @return int
     */
    public function getPriority()
    {
        return self::PRIORITY;
    }
}
