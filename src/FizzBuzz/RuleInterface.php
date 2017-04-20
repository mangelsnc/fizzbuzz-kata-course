<?php

namespace FizzBuzz;

interface RuleInterface
{
    /**
     * Check if a value matches the rule
     *
     * @param $value
     * @return boolean
     */
    public function match($value);

    /**
     * Return the replacement string
     *
     * @return string
     */
    public function getReplacement();

    /**
     * Get the priority of the rule
     *
     * @return int
     */
    public function getPriority();
}
