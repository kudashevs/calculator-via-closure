# Calculator via Closures

This is a case study that aims to show one of the possible ways of using closures in PHP language.
 

## How it works
 
We are given a `calculator()` function that accepts an argument (a `callable` with at least one argument). To start
using the closure, we need to provide a callable argument with a predefined functionality (a math operation in this
case) to the `calculator()` function and assign the result to a variable. The function is going to enclose/remember
the provided callable argument as a part of its context and is going to use it each time the closure is invoked.

```php
$addition = calculator($opaddition);
echo $addition(1, 2); // results in 3
```
for more usage examples, please see the [examples](examples/) folder.

By default, the package registers four predefined variables in the global scope. These variables are variadic anonymous
functions which correspond to the basic math operations (addition, subtraction, multiplication, division). For more
information see the [bootstrap.php](src/Operations/bootstrap.php) file).


## License

The MIT License (MIT). Please see the [License file](LICENSE.md) for more information.
