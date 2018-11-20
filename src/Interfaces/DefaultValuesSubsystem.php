<?php namespace professionalweb\IntegrationHub\DefaultValues\Interfaces;

use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Services\Subsystem;

interface DefaultValuesSubsystem extends Subsystem
{
    public const SUBSYSTEM_ID = 'default-values';

    public const CURRENT_DATE = 'current_date';

    public const CURRENT_DATETIME = 'current_datetime';

    public const CURRENT_TIMESTAMP = 'timestamp';
}