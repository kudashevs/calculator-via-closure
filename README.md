# Calculator via Closures

This is a case study that aims to show one of the possible ways of using closures in PHP language.
 

## How it works
 
We are given a [calculator()](src/calculator.php) function that accepts an argument (a `callable` with at least one argument).
To start using the closure, we need to provide an argument of the callable type with a predefined functionality (a math operation
in our case) to the `calculator()` function, and assign the result to a variable. The function is going to enclose/remember
the provided callable argument as a part of its context and is going to use it each time the closure is invoked.

```php
$addition = calculator($opaddition);
echo $addition(1, 2); // results in 3
```
for more usage examples, please see the [examples](examples/) folder.


## Notes

By default, the package uses a bootstrap that registers four global variables that correspond to the basic math operations
(addition, subtraction, multiplication, division). These variables have an `op-` prefix in their names (i.e. `$opaddition`)
and refer to variadic anonymous functions. For more information see the [bootstrap.php](src/Operations/bootstrap.php) file).

The validation of input arguments is implemented in the `checkValidArguments` function in the [calculator.php](src/calculator.php) file.

**Note** The decomposition might look strange, and it really is. However, this is just a study case on how we can use a closure
to assign some predefined behavior to a variable.


## Things to learn

[//]: # (@todo don't forget to update the line numbers)
Things that you can learn from this case study:
- closures, how they behave, and [how you can use them](src/calculator.php#L16)
- how to [check the number of arguments of a callable](src/calculator.php#L25)
- how to [register variables in the global scope](src/Operations/bootstrap.php#L32)


## License

The MIT License (MIT). Please see the [License file](LICENSE.md) for more information.