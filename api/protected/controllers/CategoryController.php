<?php

class CategoryController extends Controller
{

    public function actionList()
    {
        $categories = Category::model()->findAll();
        $message = array();

        if (!empty($categories)) {
            $message = $categories;
        }
        ApplicationHelper::ajaxResponse($message);
    }

    public function actionCreate()
    {
        if (Yii::app()->request->isPostRequest) {
            $message = array();

            $category = new Category();
            $category->setAttributes($_POST['Category']);

            if ($category->save()) {
                $message = array(
                    'status' => 'success',
                    'message' => 'Category created'
                );
            } else {
                $message = array(
                    'status' => 'error',
                    'message' => 'An unexpected error ocurred'
                );
            }
            return CJSON::encode($message);
        }
    }

    public function actionUpdate($id)
    {
        if (Yii::app()->request->isPostRequest) {
            $message = array();

            $category = Category::model()->findByPk($id);
            $category->setAttributes(ApplicationHelper::getRequest("POST", "Category"));

            if ($category->save()) {
                $message = array(
                    'status' => 'success',
                    'message' => 'Category updated'
                );
            } else {
                $message = array(
                    'status' => 'error',
                    'message' => 'An unexpected error ocurred'
                );
            }
            return CJSON::encode($message);
        }
    }

    public function actionView($id)
    {
        $message = array();

        $category = Category::model()->findByPk($id);

        if ($category) {
            $message = $category;
        } else {
            $message = array(
                'status' => 'error',
                'message' => 'The provided id isn\'t correct'
            );
        }
        return CJSON::encode($message);
    }

    public function actionDelete($id)
    {
        if (Yii::app()->request->isDeleteRequest) {
            $category = Category::model()->findByPk($id);
            $message = array();
            if ($category->delete()) {
                $message = array(
                    'status' => 'success',
                    'message' => 'Category deleted'
                );
            } else {
                $message = array(
                    'status' => 'error',
                    'message' => 'An unexpected error ocurred'
                );
            }
            return CJSON::encode($message);
        }
    }

}