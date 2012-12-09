<?php

class ShowAction extends CAction
{
    
    public function run()
    {
        $image = HApp::getRequest('GET', 'image');
        
        $md5Position = strpos($image, '_') === false ? strpos($image, '.') : strpos($image, '_');
        
        $owner = substr($image, 0, $md5Position - 32);
        $path = substr($image, strlen($owner));
        
        $imageFile = HView::getRealImageUrl($owner, $path);
        
        if(is_file($imageFile)) {
            header('Content-type: ' . image_type_to_mime_type(exif_imagetype($imageFile))); 
            echo file_get_contents($imageFile);
        }
    }

}