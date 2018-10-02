<?php
namespace CalculatorViaClosure;

class ClosureException extends \Exception
{
    protected $message = 'Wrong Closure type passed as argument';
}