<?php
class StickyComponent extends Component {

    //called before Controller::beforeFilter()
    public function initialize(Controller $controller, $settings = array()) {
    }

    //called after Controller::beforeFilter()
    public function startup(Controller $controller) {
        $controller->paginate['Node']['order'] = array(
            'Node.sticky' => 'DESC',
        );
        $controller->paginate['Node']['limit'] = 20;
        CakeLog::write('debug',print_r($controller->paginate,true));
        CakeLog::write('debug',$this->action);
    }

    public function beforeRender(Controller $controller) {
        CakeLog::write('debug',print_r($controller->paginate,true));
        CakeLog::write('debug',$this->action);
    }

}
