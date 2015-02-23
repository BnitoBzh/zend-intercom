<?php
return array(
	'zend-intercom' => array(
		'app_id' => null,
		'api_key' => null
	),
	'service_manager' => array(
		'aliases' => array(
        	'intercom'  => 'ZendIntercom\Service\IntercomService',
		),
		'factories' => array(
			'ZendIntercom\Service\IntercomService' => 'ZendIntercom\Factory\IntercomServiceFactory'
		)
	),
    'controller_plugins' => array(
        'factories' => array(
            'intercom' => 'ZendIntercom\Factory\IntercomControllerPluginFactory',
        ),
    ),
);