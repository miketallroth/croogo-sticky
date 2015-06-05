<?php
class StickyComponent extends Component {

    //called before Controller::beforeFilter()
    public function initialize(Controller $controller, $settings = array()) {
    }

    //called after Controller::beforeFilter()
    public function startup(Controller $controller) {

        $stickyOrder = array('Node.sticky' => 'DESC');

        if (!array_key_exists('Node', $controller->paginate)) {
            $controller->paginate = array('Node' => array());
        }
        
        if (!array_key_exists('order', $controller->paginate['Node'])) {
            $order = $stickyOrder;
        } else {
            $order = $controller->paginate['Node']['order'];
            if (empty($order)) {
                $order = $stickyOrder;
            } else {
                if (is_array($order)) {
                    array_unshift($order, $stickyOrder);
                } else {
                    $oldOrder = $order;
                    $order = $stickyOrder;
                    $order[] = $oldOrder;
                }
            }
        }

        $controller->paginate['Node']['order'] = $order;
        $controller->paginate['Node']['limit'] = 20;
    }

}
