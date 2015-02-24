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

use Zend\Mvc\MvcEvent;

/**
 * Class Module
 *
 * @package ZendIntercom
 */
class Module
{
    protected $serviceManager;
    protected $config;
    
    /**
     * @param MvcEvent $event
     */
    public function onBootstrap(MvcEvent $event)
    {
        $this->serviceManager = $event->getApplication()->getServiceManager();
        $this->config = $this->serviceManager->get('Config');
    
        if ($this->config['zend-intercom']['enable-javascript-integration']) {
            $this->setupJavascriptLogging($event);
        }
    }
    
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
    
    /**
     * Adds the necessary javascript, tries to prepend
     *
     * @param MvcEvent $event
     */
    protected function setupJavascriptLogging(MvcEvent $event)
    {
        $appID = $this->config['zend-intercom']['app_id'];
        $auth = $this->serviceManager->get('zfcuser_auth_service');
        if ($auth->hasIdentity()) {
            $user = $auth->getIdentity();
            $viewHelper = $event->getApplication()->getServiceManager()->get('viewhelpermanager')->get('headscript');
            $viewHelper->appendScript(sprintf('window.intercomSettings = {user_id: "%s",email: "%s",app_id: "%s"};', $user->getId(), $user->getEmail(), $appID));
            $viewHelper->appendScript(sprintf("(function(){var w=window;var ic=w.Intercom;if(typeof ic===\"function\"){ic('reattach_activator');ic('update',intercomSettings);}else{var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Intercom=i;function l(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/%s';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);}if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})()", $appID));
        }
        
    }
}
