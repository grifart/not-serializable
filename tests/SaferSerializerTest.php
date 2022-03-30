<?php

use Grifart\NotSerializable\SaferSerializer;
use Grifart\NotSerializable\NoSerialization;
use Tester\Assert;

require __DIR__ . '/../vendor/autoload.php';

class NestedSerialization {
	private object $nested;
	public function __construct(object $nested){$this->nested = $nested;}

	/**
	 * @return array{someKey: object}
	 */
	public function __serialize(): array
	{
		return [
			'someKey' => $this->nested
		];
	}

	/**
	 * @param array{someKey: object} $data
	 */
	public function __unserialize(array $data): void
	{
		$this->nested = $data['someKey'];
	}
}


// This is the case when classic serialization & SaferSerialization behaviour is different
class SerializationNotStated {}

Assert::noError(fn() => serialize(new SerializationNotStated()));
Assert::noError(fn() => serialize(new NestedSerialization(new SerializationNotStated())));

Assert::exception(fn() => SaferSerializer::serialize(new SerializationNotStated()), LogicException::class, 'Object of type SerializationNotStated do NOT explicitly state serialization support using __serialize() && __unserialize() methods.');
Assert::exception(fn() => SaferSerializer::serialize(new NestedSerialization(new SerializationNotStated())), LogicException::class, 'Object of type SerializationNotStated do NOT explicitly state serialization support using __serialize() && __unserialize() methods.');



// Now check that we did not break anything:

class SerializationDisabled {
	use NoSerialization;
}

Assert::exception(fn() => serialize(new SerializationDisabled()), LogicException::class, "The class 'SerializationDisabled' is not meant to be serialized.");
Assert::exception(fn() => serialize(new NestedSerialization(new SerializationDisabled())), LogicException::class, "The class 'SerializationDisabled' is not meant to be serialized.");

Assert::exception(fn() => SaferSerializer::serialize(new SerializationDisabled()), LogicException::class, "The class 'SerializationDisabled' is not meant to be serialized.");
Assert::exception(fn() => SaferSerializer::serialize(new NestedSerialization(new SerializationDisabled())), LogicException::class, "The class 'SerializationDisabled' is not meant to be serialized.");



class SerializationImplemented {
	/** @return array{} */
	public function __serialize(): array { return [];}
	/** @param array{} $data */
	public function __unserialize(array $data): void {}
}

Assert::noError(fn() => serialize(new SerializationImplemented()));
Assert::noError(fn() => serialize(new NestedSerialization(new SerializationImplemented())));

Assert::noError(fn() => SaferSerializer::serialize(new SerializationImplemented()));
Assert::noError(fn() => SaferSerializer::serialize(new NestedSerialization(new SerializationImplemented())));

