<?php

namespace CachetHQ\Tests\Segment\Facades;

use GrahamCampbell\TestBench\Traits\FacadeTestCaseTrait;
use CachetHQ\Tests\Segment\AbstractTestCase;

class SegmentTest extends AbstractTestCase
{
	use FacadeTestCaseTrait;

	/**
	 * Get the facade accessor.
	 *
	 * @return string
	 */
	protected function getFacadeAccessor()
	{
		return 'segment';
	}

	/**
	 * Get the facade class.
	 *
	 * @return string
	 */
	protected function getFacadeClass()
	{
		return 'CachetHQ\Segment\Facades\Segment';
	}

	/**
	 * Get the facade route.
	 *
	 * @return string
	 */
	protected function getFacadeRoot()
	{
		return 'CachetHQ\Segment\SegmentManager';
	}
}
