<?php

/**
 * BnitoBzh ZendIntercom
 *
 * This source file is part of the BnitoBzh ZendIntercom package
 *
 * @package    ZendIntercom\Module
 * @license    New BSD License {@link /LICENSE}
 * @copyright  Copyright (c) 2015, BnitoBzh
 */

namespace ZendIntercom;

/**
 * Class Module
 *
 * @package ZendIntercom
 */
class Module
{
    /**
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array('Zend\Loader\StandardAutoloader' => array('namespaces' => array(
            __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
        )));
    }

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}
