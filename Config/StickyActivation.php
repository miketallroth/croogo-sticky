<?php
/**
 * Sticky Activation
 *
 * Activation class for Sticky plugin.
 *
 * @package  Sticky
 * @author   Mike Tallroth <mike.tallroth@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://github.com/miketallroth/croogo-authadapter
 */
class StickyActivation {

    public function beforeActivation(Controller $controller) {
        return true;
    }

    public function onActivation(Controller $controller) {

        // update the Recent Posts block to order by the sticky bit
        $Block = ClassRegistry::init('Block');
        $recentBlock = $Block->find('first', array(
            'conditions' => array(
                'Block.title' => 'Recent Posts',
            ),
        ));

        $recentBlock['Block']['body'] = '[node:recent_posts conditions="Node.type:blog" order="-(Node.sticky), Node.id DESC" limit="5"]';

        $Block->save($recentBlock);

    }

    public function beforeDeactivation(Controller $controller) {
        return true;
    }

    public function onDeactivation(Controller $controller) {
    }

}
