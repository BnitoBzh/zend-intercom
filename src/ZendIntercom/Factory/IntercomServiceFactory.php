<?php
/**
 * BnitoBzh ZendIntercom
 *
 * This source file is part of the BnitoBzh ZendIntercom package
 *
 * @package    ZendIntercom\Factory\IntercomServiceFactory
 * @license    New BSD License {@link /LICENSE}
 * @copyright  Copyright (c) 2015, BnitoBzh
 */
namespace ZendIntercom\Factory;

use Intercom\IntercomBasicAuthClient;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class IntercomServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('config');
        $config = $config['zend-intercom'];
        $name   = $config['transport']['type'];
        
        $intercom = IntercomBasicAuthClient::factory(array(
    		'app_id' => $config['app_id'],
    		'api_key' => $config['api_key']
		));
		
        return $intercom;
    }
}
