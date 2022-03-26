# Classes should not be serializable by default!

...and this package makes it easier for you.

# The story

You should not be able to inherit from object which was not explicitly designed to be extended (`final` by default). [1](https://matthiasnoback.nl/2018/09/final-classes-by-default-why/), [2](http://whiley.org/2011/12/06/final-should-be-default-for-classes-in-java/) You get much better object encapsulation, you know exactly how you object behaves.

In 3/2022 I have found a similar pattern that breaks object-encapsulation. The feature is **implicit support for object serialization**. Let's say we have an object:

```php
class UserId { public function __construct(private int $id) {} }

// later in an app
$userId = new UserId(42);
// ...
$_SESSION['user_id'] = $userId;
```

This will work. No warning, no errors, no problems. For now...

Later in time you have decided to do internal change of `UserId` object – rename private property `$id` to `$identifier`.

```diff
-class UserId { public function __construct(private int $id) {} }
+class UserId { 
+   private int $identifier;
+   public function __construct(int $id) {$this->identifier = $id}
+}
```

There is no public change of behaviour. There is no way outer observer should be able to find any changes in object behaviour. Static analysis passes, tests passes. All good! You deploy your application.

Boom! 🔥 Application hard crashed for every user that has been logged-in.

This magic behaviour is [an explosive mine 💥](https://en.wikipedia.org/wiki/Explosive_mine), that you cannot easily spot from the surface or even in code-review.

# The solution

**Replace implicit serialization with the explicit one.**

## Disabling implicit serialization

In PHP every object is serializable by default, until you say otherwise. So let's say otherwise.

This makes most sense for _value objects_ and all its derivatives like _entities_. There is however no harm by disabling serialization support for all classes as you would never-ever want to serialize a service.


Open you PhpStorm settings and then `Editor > File and Code Templates > Files > PHP Class` and update the template.

```php
final class ${NAME} {
	use \Grifart\NotSerializable\NotSerializable;
}
```

<img src=docs/phpstorm-settings.png width=400 alt="PhpStorm default template settings">

Require this package using composer in your project

```bash
composer require grifart/not-serializable
```

It contains a [simple trait](src), that disables serialization support for _PHP >7.4_. That is because serialization API has been changed [php-watch](https://php.watch/versions/8.1/serializable-deprecated).


## Making the serialization explicit

When you **need** serialization support, implement serialization API explicitly.

Great thing is that when it is not possible to serialize by default, someone has to make a decision that **we need it be serializable**.

This allows us also choose right type of serialization:

### a) Short term & simple

PHP serialization API: Allows you to quick start. Breaks when you start moving your classes around (heavily depends on our classes FQNs).

You can go this way by:
1. removing the trait
2. implementing `__serialize()` and `__unserialize()` methods.

### b) Long term serialization

[grifart/stateful](https://github.com/grifart/stateful): Strict versioning, field checking and class name routing. Designed for serialization that can be deserialized after years, even when codebase changes significantly and for maximal strictness, so it fails on you dev maching, not on production.

You can go this way by:
1. removing the trait
2. implementing `Stateful` interface & `composer require `[grifart/stateful](https://github.com/grifart/stateful)


# Further development

- [ ] PhpStan / Rector rule, that finds/fixes classes that does not have serialization disables and does NOT implement serialization explicitly (How to apply this only to value objects & derivatives?)
