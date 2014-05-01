<?php

class FileConfig extends DataExtension {

    /**
     * @return string
     */
    public function ExtensionIcon(){
        $extension = $this->owner->getExtension();

        switch($extension){
            case 'jpg':
            case 'gif':
            case 'png':
            case 'jpeg':
                $class = 'fa fa-picture-o';
                break;
            case 'pdf':
                $class = 'fa fa-file-text';
                break;
            default:
                $class = 'fa fa-file-o';
        }

        return '<i class="'.$class.'"></i>';
    }
}
