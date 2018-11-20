<?php namespace professionalweb\IntegrationHub\DefaultValues\Providers;

use Illuminate\Support\ServiceProvider;
use professionalweb\IntegrationHub\DefaultValues\Services\DefaultValuesSubsystem;
use professionalweb\IntegrationHub\Mapper\Interfaces\DefaultValuesSubsystem as IDefaultValuesSubsystem;

class DefaultValuesProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(EventServiceProvider::class);
        $this->app->bind(IDefaultValuesSubsystem::class, DefaultValuesSubsystem::class);
    }
}