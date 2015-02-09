<?php

namespace CachetHQ\Segment;

use GrahamCampbell\Manager\AbstractManager;
use Illuminate\Contracts\Config\Repository;
use CachetHQ\Segment\Factories\SegmentFactory;

class SegmentManager extends AbstractManager
{
	/**
	 * @var SegmentFactory
	 */
	private $factory;

	/**
	 * @param Repository $config
	 * @param SegmentFactory $factory
	 */
	function __construct(Repository $config, SegmentFactory $factory)
	{
		parent::__construct($config);

		$this->factory = $factory;
	}

	/**
	 * Create the connection instance.
	 *
	 * @param array $config
	 *
	 * @return mixed
	 */
	protected function createConnection(array $config)
	{
		return $this->factory->make($config);
	}

	/**
	 * Get the configuration name.
	 *
	 * @return string
	 */
	protected function getConfigName()
	{
		return 'segment';
	}

	/**
	 * Get the factory instance.
	 *
	 * @return SegmentFactory
	 */
	public function getFactory()
	{
		return $this->factory;
	}
}
