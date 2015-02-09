<?php

namespace CachetHQ\Segment\Factories;

use Segment;
use Segment_Client;

class SegmentFactory
{
	/**
	 * Make a new Segment client.
	 *
	 * @param array $config
	 * @return Segment_Client
	 */
	public function make(array $config)
	{
		$config = $this->getConfig($config);

		Segment::init(
			$config['secret'],
			$config['options']
		);

		return new Segment_Client(
			$config['secret'],
			$config['options']
		);
	}

	/**
	 * Get the configuration data.
	 *
	 * @param string[] $config
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return string
	 */
	protected function getConfig(array $config)
	{
		$keys = ['secret', 'options'];

		foreach($keys as $key) {
			if (!array_key_exists($key, $config)) {
				throw new \InvalidArgumentException('The Segment client requires authentication.');
			}
		}

		return array_only($config, $keys);
	}
}
