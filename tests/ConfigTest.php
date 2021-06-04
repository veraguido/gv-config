<?php

class ConfigTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function testConfigException()
    {
        $this->expectException(Exception::class);
        $config = new \Gvera\Helpers\config\Config('asd');
    }

    /**
     * @test
     */
    public function testConfigValue()
    {
        $config = new \Gvera\Helpers\config\Config();
        $this->assertTrue($config->getConfigItem('devmode'));
    }
}
