<?php

require __DIR__ . '/../vendor/autoload.php';


class SomeClass {
	use \Grifart\NotSerializable\NoSerialization;
}

\Tester\Assert::exception(
	fn() => serialize(new SomeClass()),
	LogicException::class, "The class 'SomeClass' is not meant to be serialized."
);
