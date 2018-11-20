<?php namespace professionalweb\IntegrationHub\DefaultValues\Listeners;

use professionalweb\IntegrationHub\DefaultValues\Interfaces\DefaultValuesSubsystem;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Events\EventToProcess;

class NewEventListener
{
    public function handle(EventToProcess $eventToProcess)
    {
        return $eventToProcess->getProcessOptions()->getSubsystemId() === DefaultValuesSubsystem::SUBSYSTEM_ID ?
            app(DefaultValuesSubsystem::class)->setProcessOptions($eventToProcess->getProcessOptions())->process($eventToProcess->getEventData()) :
            null;
    }
}