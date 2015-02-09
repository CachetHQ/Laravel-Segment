<?php

namespace CachetHQ\Tests\Segment;

use GrahamCampbell\TestBench\Traits\ServiceProviderTestCaseTrait;

class ServiceProviderTest extends AbstractTestCase
{
	use ServiceProviderTestCaseTrait;

	public function testSegmentFactoryIsInjectable()
	{
		$this->assertIsInjectable('CachetHQ\Segment\Factories\SegmentFactory');
	}

	public function testSegmentManagerIsInjectable()
	{
		$this->assertIsInjectable('CachetHQ\Segment\SegmentManager');
	}
}
