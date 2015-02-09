<?php

namespace CachetHQ\Tests\Segment\Factories;

use CachetHQ\Segment\Factories\SegmentFactory;
use CachetHQ\Tests\Segment\AbstractTestCase;

class SegmentFactoryTest extends AbstractTestCase
{
	public function testMakeStandard()
	{
		$factory = $this->getSegmentFactory();

		$return = $factory->make([
			'secret' => 'your-secret-key',
			'options' => []
		]);

		$this->assertInstanceOf('Segment_Client', $return);
	}

	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testMakeWithoutClientId()
	{
		$factory = $this->getSegmentFactory();

		$factory->make([]);
	}

	protected function getSegmentFactory()
	{
		return new SegmentFactory();
	}
}
