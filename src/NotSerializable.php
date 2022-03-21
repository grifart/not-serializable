<?php


namespace Grifart\NotSerializable;


/**
 * Use this trait to state that class is NOT meant to be serializable.
 * API docs: https://php.watch/versions/8.1/serializable-deprecated
 */
trait NotSerializable
{

	/**
	 * @return never
	 */
	public function __serialize() {
		throw new \LogicException(
			\sprintf("The class '%s' is not meant to be serialized.", get_class($this))
		);
	}

	/**
	 * @param array{} $data
	 * @return never
	 */
	public function __unserialize(array $data) {
		throw new \LogicException(
			\sprintf("The class '%s' is not meant to be serialized.", get_class($this))
		);
	}

}