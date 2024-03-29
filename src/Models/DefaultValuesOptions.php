<?php namespace professionalweb\IntegrationHub\DefaultValues\Models;

use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Models\SubsystemOptions;

/**
 * Subsystem options
 * @package professionalweb\IntegrationHub\DefaultValues\Models
 */
class DefaultValuesOptions implements SubsystemOptions
{

    /**
     * Get available fields for mapping
     *
     * @return array
     */
    public function getAvailableFields(): array
    {
        return [];
    }

    /**
     * Get array fields, that subsystem generates
     *
     * @return array
     */
    public function getAvailableOutFields(): array
    {
        return [];
    }

    /**
     * Get service settings
     *
     * @return array
     */
    public function getOptions(): array
    {
        return [
            'map' => [
                'name' => 'Map',
                'type' => 'list',
            ],
        ];
    }
}