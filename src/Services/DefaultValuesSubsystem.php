<?php namespace professionalweb\IntegrationHub\DefaultValues\Services;

use Illuminate\Support\Arr;
use professionalweb\IntegrationHub\DefaultValues\Models\DefaulValuesOptions;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\EventData;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Services\Subsystem;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Models\ProcessOptions;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Models\SubsystemOptions;
use professionalweb\IntegrationHub\DefaultValues\Interfaces\DefaultValuesSubsystem as IDefaultValuesSubsystem;

class DefaultValuesSubsystem implements IDefaultValuesSubsystem
{
    /**
     * @var ProcessOptions
     */
    private $processOptions;

    /**
     * Set options with values
     *
     * @param ProcessOptions $options
     *
     * @return Subsystem
     */
    public function setProcessOptions(ProcessOptions $options): Subsystem
    {
        $this->processOptions = $options;

        return $this;
    }

    /**
     * Get available options
     *
     * @return SubsystemOptions
     */
    public function getAvailableOptions(): SubsystemOptions
    {
        return new DefaulValuesOptions();
    }

    /**
     * Process event data
     *
     * @param EventData $eventData
     *
     * @return EventData
     * @throws \Exception
     */
    public function process(EventData $eventData): EventData
    {
        $map = $this->getProcessOptions()->getOptions()['map'] ?? [];
        if (empty($map)) {
            return $eventData;
        }
        $data = $eventData->getData();
        foreach ($map as $field => $value) {
            if (!empty(Arr::get($data, $field))) {
                switch ($value) {
                    case self::CURRENT_DATE:
                        $value = date('Y-m-d');
                        break;
                    case self::CURRENT_DATETIME:
                        $value = date('Y-m-d H:i:s');
                        break;
                    case self::CURRENT_TIMESTAMP:
                        $value = time();
                        break;
                }
                Arr::set($data, $field, $value);
            }
        }

        return $eventData->setData($data);
    }

    /**
     * @return ProcessOptions
     */
    public function getProcessOptions(): ProcessOptions
    {
        return $this->processOptions;
    }
}