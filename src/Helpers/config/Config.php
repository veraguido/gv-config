<?php
namespace Gvera\Helpers\config;

use Gvera\Exceptions\InvalidArgumentException;
use Symfony\Component\Yaml\Yaml;

/**
 * Class Config
 * @package Gvera\Helpers\config
 * This class is a driver for the config, if this one is saved into redis it will get it
 * if not, it will fetch it from the yml file, and save it into the cache.
 */
class Config
{
    const CONFIG_KEY = 'gv_config';
    private array $config;

    /**
     * Config constructor.
     * @param string|null $configFilePath
     * @throws InvalidArgumentException
     */
    public function __construct(?string $configFilePath = null)
    {
        if (null === $configFilePath) {
            $configFilePath = __DIR__ . "/../../../config/config.yml";
        }

        if (!file_exists($configFilePath)) {
            throw new InvalidArgumentException('config file could not be found');
        }

        $this->setConfig(Yaml::parse(file_get_contents($configFilePath))["config"]);
    }

    public function getConfigItem($key)
    {
        return $this->config[$key];
    }

    public function setConfig($config)
    {
        $this->config = $config;
    }
}
