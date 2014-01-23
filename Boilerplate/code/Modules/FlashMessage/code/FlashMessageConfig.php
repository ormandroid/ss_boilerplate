<?php

class FlashMessageConfig extends DataExtension {

    public function setFlash($message, $type = 'info'){
        Session::set('FlashMessage', array(
            'FlashMessageType' => $type,
            'FlashMessage' => $message
        ));
    }

    public function getFlashMessage(){
        if($message = Session::get('FlashMessage')){
            Session::clear('FlashMessage');
            $array = new ArrayData($message);
            return $array->renderWith('FlashMessage');
        }
    }

}