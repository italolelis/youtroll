<?php

class ViewAction extends CAction
{

    public function run()
    {
        $category = HApp::getRequest('PARAM', 'category');

        if (!empty($category)) {
            $idCategory = Category::getIDByKeyName($category);
            $publications = PersistenceServer::connect('publication', 'GET', array('category' => $idCategory, 'scope' => 'category', 'limit' => Yii::app()->params['maxCategoriesPublications']));
            
            $renderParams = array(
                'categoryName' => Category::getNameByID($idCategory),
                'publications' => $publications,
            );
            
            if(Yii::app()->request->isAjaxRequest) {
                $this->controller->renderPartial('view', $renderParams, false, true);
                Yii::app()->end();
            }
            
            $this->controller->render('view', $renderParams);
            Yii::app()->end();
        }

        HApp::throwException(403);
    }

}