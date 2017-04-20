<?php

namespace FizzBuzz;

class FizzBuzzRule implements RuleInterface
{
    const FIZZBUZZ_FACTOR = 15;
    const PRIORITY = 1;

    /**
     * @param $value
     * @return bool
     */
    public function match($value)
    {
        if (0 === $value % self::FIZZBUZZ_FACTOR) {
            return true;
        }

        return false;
    }

    /**
     * @return string
     */
    public function getReplacement()
    {
        return 'FizzBuzz';
    }

    /**
     * @return int
     */
    public function getPriority()
    {
        return self::PRIORITY;
    }
}
