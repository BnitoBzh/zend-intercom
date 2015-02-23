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

use ZendIntercom\Controller\Plugin\Intercom as IntercomControllerPlugin;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class IntercomControllerPluginFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $service = $serviceLocator->getServiceLocator()->get('ZendIntercom\Service\IntercomService');

        return new IntercomControllerPlugin($service);
    }
}
