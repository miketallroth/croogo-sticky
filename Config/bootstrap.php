<?php
/*
 * Add a new View path so that our Nodes view override will
 * be seen from this plugin.
 */
App::build(array('View' => array(APP . 'Plugin/Sticky/View/')), 'prepend');

Croogo::hookComponent('Nodes', 'Sticky.Sticky');
