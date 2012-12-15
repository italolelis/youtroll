<?php

Yii::import('ext.feed.EFeed');
Yii::import('ext.feed.EFeedItemRSS2');
Yii::import('ext.feed.EFeedItemAbstract');
Yii::import('ext.feed.EFeedTag');

class FeedAction extends CAction
{

    public function run()
    {
        $recentPublications = PersistenceServer::connect('publication', 'GET', array('scope' => 'recent', 'limit' => Yii::app()->params['maxFeedPublications']));
        
        $feed = new EFeed();

        $feed->title = HApp::t('name');
        $feed->description = HApp::t('siteDescription');

        $feed->setImage(HApp::t('name'), HApp::getCurrentUrl(), Yii::app()->getBaseUrl(true) . '/resources/img/logo.png');
        
        $feed->addChannelTag('language', Yii::app()->getLanguage());
        $feed->addChannelTag('pubDate', date(DATE_RSS, time()));
        $feed->addChannelTag('link', Yii::app()->getBaseUrl(true));
        
        foreach ($recentPublications as $publication) {
            $owner = PersistenceServer::connect("user/{$publication->owner}", 'GET');
            
            $item = $feed->createNewItem();
        
            $item->title = $publication->title;
            $item->link = Yii::app()->createAbsoluteUrl('', array('view' => HSecurity::urlEncode($publication->id)));
            $item->date = $publication->record;
            $item->description = $publication->description;

            if($owner->name) {
                $item->addTag('author', $owner->name);
            }

            $feed->addItem($item);
        }

        $feed->generateFeed();
    }

}