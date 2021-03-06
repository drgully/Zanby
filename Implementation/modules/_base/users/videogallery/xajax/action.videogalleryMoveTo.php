<?php
    Warecorp::addTranslation("/modules/users/videogallery/xajax/action.videogalleryMoveTo.php.xml");
    $objResponse = new xajaxResponse() ;

    if (empty($videoId)) return;

    if (!Warecorp_Video_AccessManager_Factory::create()->canUploadVideos($this->currentUser, $this->_page->_user)) return;

    $video = Warecorp_Video_Factory::loadById($videoId);

    if (!$video->getId()) return;

    $galleriesList = Warecorp_Video_Gallery_List_Factory::load($this->_page->_user);
    $galleriesList = $galleriesList
                ->setSharingMode(array(Warecorp_Video_Enum_SharingMode::OWN))
                ->setWatchingMode(array(Warecorp_Video_Enum_WatchingMode::OWN))
                ->returnAsAssoc()
                ->setExcludeIds(array($video->getGalleryId()))
                ->getList();

    $this->view->collections = $galleriesList;
    $this->view->JsApplication = 'PGPLApplication';
    
    $content = $this->view->getContents('users/videogallery/xajax.moveto.tpl'); 
    
    $popup_window = Warecorp_View_PopupWindow::getInstance();
    $popup_window->title(Warecorp::t("Move To Collection" ));
    $popup_window->content($content);
    $popup_window->width(450)->height(150)->open($objResponse);
