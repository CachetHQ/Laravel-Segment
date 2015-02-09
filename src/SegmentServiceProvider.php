<?php

namespace CachetHQ\Segment;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class SegmentServiceProvider extends ServiceProvider
{
	/**
	 * Boot the service provider.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->setupConfig();
	}

	/**
	 * Setup the config.
	 *
	 * @return void
	 */
	protected function setupConfig()
	{
		$source = realpath(__DIR__.'/../config/segment.php');
		$this->publishes([$source => config_path('segment.php')]);
		$this->mergeConfigFrom($source, 'segment');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->registerFactory($this->app);
		$this->registerManager($this->app);
	}

	/**
	 * Register the factory class.
	 *
	 * @param \Illuminate\Contracts\Foundation\Application $app
	 *
	 * @return void
	 */
	protected function registerFactory(Application $app)
	{
		$app->singleton('segment.factory', function()
		{
			return new Factories\SegmentFactory();
		});
		$app->alias('segment.factory', 'Vinkla\Segment\Factories\SegmentFactory');
	}

	/**
	 * Register the manager class.
	 *
	 * @param \Illuminate\Contracts\Foundation\Application $app
	 *
	 * @return void
	 */
	protected function registerManager(Application $app)
	{
		$app->singleton('segment', function($app)
		{
			$config = $app['config'];
			$factory = $app['segment.factory'];

			return new SegmentManager($config, $factory);
		});

		$app->alias('segment', 'Vinkla\Segment\SegmentManager');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return [
			'segment',
			'segment.factory'
		];
	}
}
