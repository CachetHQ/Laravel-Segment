<?php

namespace CachetHQ\Tests\Segment;

use GrahamCampbell\TestBench\AbstractTestCase as AbstractTestBenchTestCase;
use Mockery;
use CachetHQ\Segment\SegmentManager;

class SegmentManagerTest extends AbstractTestBenchTestCase
{
	public function testCreateConnection()
	{
		$config = ['path' => __DIR__];

		$manager = $this->getManager($config);

		$manager->getConfig()->shouldReceive('get')->once()
			->with('segment.default')->andReturn('segment');

		$this->assertSame([], $manager->getConnections());

		$return = $manager->connection();

		$this->assertInstanceOf('Segment', $return);

		$this->assertArrayHasKey('segment', $manager->getConnections());
	}

	protected function getManager(array $config)
	{
		$repository = Mockery::mock('Illuminate\Contracts\Config\Repository');
		$factory = Mockery::mock('CachetHQ\Segment\Factories\SegmentFactory');

		$manager = new SegmentManager($repository, $factory);

		$manager->getConfig()->shouldReceive('get')->once()
			->with('segment.connections')->andReturn(['segment' => $config]);

		$config['name'] = 'segment';

		$manager->getFactory()->shouldReceive('make')->once()
			->with($config)->andReturn(Mockery::mock('Segment'));

		return $manager;
	}
}
