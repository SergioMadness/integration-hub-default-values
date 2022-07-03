<?php namespace professionalweb\IntegrationHub\DefaultValues\Providers;

use Illuminate\Support\ServiceProvider;
use professionalweb\IntegrationHub\DefaultValues\Models\DefaultValuesOptions;
use professionalweb\IntegrationHub\DefaultValues\Services\DefaultValuesSubsystem;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Services\SubsystemPool;
use professionalweb\IntegrationHub\DefaultValues\Interfaces\DefaultValuesSubsystem as IDefaultValuesSubsystem;

class DefaultValuesProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'IntegrationHubDefaultValues');

        $this->app->booted(static function () {
            /** @var SubsystemPool $pool */
            $pool = app(SubsystemPool::class);
            $pool->register(trans('IntegrationHubDefaultValues::common.name'), DefaultValuesSubsystem::SUBSYSTEM_ID, new DefaultValuesOptions());
        });
    }

    public function register(): void
    {
        $this->app->register(EventServiceProvider::class);
        $this->app->bind(IDefaultValuesSubsystem::class, DefaultValuesSubsystem::class);
    }
}