<?php

include __DIR__ . '/vendor/autoload.php';

use FizzBuzz\ListGenerator;
use FizzBuzz\FizzRule;
use FizzBuzz\BuzzRule;
use FizzBuzz\FizzBuzzRule;

$fizzbuzz = new ListGenerator();
$fizzbuzz->addRule(new FizzRule());
$fizzbuzz->addRule(new BuzzRule());
$fizzbuzz->addRule(new FizzBuzzRule());

$fizzbuzz->getList();
