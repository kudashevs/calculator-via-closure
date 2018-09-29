## Calculator Via Interface

A simple calculator app written in PHP with PHPUnit tests which implements mathematics operators through closures.

Basic idea is to use CalculatorGenerator function which receive closure implementation of some math operator as an argument
and store it inside the return closure function. When we can calculate result through this stored Closure referring it like
"variable function" with arguments. The example of CalculatorGenerator usage you can find in index.php file in the root directory.


This is not ideal solution and only a case study on how to implement some functionality through Closures.  
Any ideas, suggestions, issues, code reviews and comments are highly welcome :)