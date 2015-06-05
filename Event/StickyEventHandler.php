<?php

App::uses('CakeEventListener', 'Event');

/**
 * Sticky Event Handler
 *
 * @category Event
 * @package  Sticky
 * @license  
 * @link     
 *
 * An event handler to insert an order before the promoted()
 * action.
 */
class StickyEventHandler implements CakeEventListener {

/**
 * implementedEvents
 *
 * @return array
 */
	public function implementedEvents() {
		return array(
			'Helper.Layout.beforeFilter' => array(
				'callable' => 'beforeFilter',
			),
		);
	}

	/**
	 */
	public function beforeFilter($event) {

        return;

	}

}
