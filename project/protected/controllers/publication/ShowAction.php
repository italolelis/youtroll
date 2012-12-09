<?php

class ShowAction extends CAction
{
    
    public function run()
    {
        $image = HView::getRealImageUrl(HApp::getRequest('GET', 'owner'), HApp::getRequest('GET', 'path'));
        
        if(is_file($image)) {
            header('Content-type: ' . image_type_to_mime_type(exif_imagetype($image))); 
            echo file_get_contents($image);
        }
    }

}