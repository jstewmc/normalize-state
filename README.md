# normalize-state

Normalize a state name or abbreviation to its long, downcase form in a case-, whitespace-, and trailing-period-insensitive way:

```php
namespace Jstewmc\NormalizeState;

// instantiate the service
$service = new NormalizeState();

$service('co');        // returns "colorado"
$service('CO');        // returns "colorado"
$service('   co   ');  // returns "colorado"
$service('CO.');       // returns "colorado"
$service('Colorado');  // returns "colorado"
$service('foo');       // returns "foo"
```

## Dependencies

This library depends on an implementation of the `ExpandAbbreviations` interface to expand state abbreviations to their full name. 

If you don't provide an implementation on instantiation, it will default to the `DefaultExpandAbbreviations` implementation, an extension of the [jstewmc/expand-abbreviations](https://github.com/jstewmc/expand-abbreviations) library, and a list of state abbreviations from the [United States Post Office](https://pe.usps.com/text/pub28/28apb.htm).

## Author

[Jack Clayton](clayjs0@gmail.com)

## Version

This library uses [semantic versioning](http://semver.org).

### 0.1.0, September 9, 2017

* Initial release

## License

[MIT](https://github.com/jstewmc/normalize-state/blob/master/LICENSE)
