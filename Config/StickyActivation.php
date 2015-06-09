<?php
/**
 * Sticky Activation
 *
 * Activation class for Sticky plugin.
 *
 * @package  Sticky
 * @author   Mike Tallroth <mike.tallroth@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://github.com/miketallroth/croogo-sticky
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

        // Create a new Block called "Sticky Posts" based on
        // "Recent Posts" with new block body.
        $recentBlock['Block']['id'] = null;
        $recentBlock['Block']['title'] = 'Sticky Posts';
        $recentBlock['Block']['alias'] = 'sticky_posts';
        $recentBlock['Block']['body'] = '[node:sticky_posts conditions="Node.type:blog" order="Node.sticky DESC, Node.id DESC" limit="5"]';
        $recentBlock['Block']['updated'] = null;
        $recentBlock['Block']['created'] = null;

        $Block->save($recentBlock);
       
    }

    public function beforeDeactivation(Controller $controller) {
        return true;
    }

    public function onDeactivation(Controller $controller) {
    }

}
