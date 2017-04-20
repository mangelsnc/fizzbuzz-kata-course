<?php

namespace FizzBuzz;

class BuzzRule implements RuleInterface
{
    const FACTOR = 5;
    const PRIORITY = 3;

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
        return 'Buzz';
    }

    /**
     * @return int
     */
    public function getPriority()
    {
        return self::PRIORITY;
    }
}
