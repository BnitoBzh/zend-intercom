<?php
/**
 * BnitoBzh ZendIntercom
 *
 * This source file is part of the BnitoBzh ZendIntercom package
 *
 * @package    ZendIntercom\Controller\Plugin\Intercom
 * @license    New BSD License {@link /LICENSE}
 * @copyright  Copyright (c) 2015, BnitoBzh
 */
namespace ZendIntercom\Controller\Plugin;

use \Intercom\IntercomBasicAuthClient;
use Zend\Mail\Message;
use Zend\Mvc\Controller\Plugin\AbstractPlugin;

/**
 * Intercom controller plugin as proxy to the Intercom service
 */
class Intercom extends AbstractPlugin
{
    /**
     * @var IntercomBasicAuthClient
     */
    protected $service;

    /**
     * Constructor
     *
     * @param  IntercomBasicAuthClient $service
     * @return \ZendIntercom\Intercom
     */
    public function __construct(IntercomBasicAuthClient $service)
    {
        $this->service = $service;
    }

    /**
     * Invoke Intercom service
     *
     * @return \Intercom\IntercomBasicAuthClient
     */
    public function __invoke()
    {
        return $this->getService();
    }

    /**
     * Get the Intercom service class
     *
     * @return IntercomBasicAuthClient
     */
    protected function getService()
    {
        return $this->service;
    }
}
