<?php
Warecorp::addTranslation('/modules/groups/gallery/xajax/action.galleryEditPhoto.php.xml');

$objResponse = new xajaxResponse () ;
$gallery = Warecorp_Photo_Gallery_Factory::loadById($galleryId);
$photo = Warecorp_Photo_Factory::loadById($photoId);

if ( $gallery->getId() !== null && $photo->getId() !== null && Warecorp_Photo_AccessManager_Factory::create()->canEditPhoto($photo, $this->currentGroup, $this->_page->_user) ) {
    $tags = $photo->setForceDbTags()->getTagsList();
    $tags_str = array();
    if ( sizeof($tags) != 0 ) { foreach ( $tags as $tag ) $tags_str[] = $tag->getPreparedTagName();}
    $tags_str = join(' ', $tags_str);
    
    $form = new Warecorp_Form('editPhotoForm', 'post', $this->currentGroup->getGroupPath('galleryEditPhotoDo'));
    $this->view->form = $form;
    $this->view->gallery = $gallery;
    $this->view->photo = $photo;
    $this->view->photoTags = $tags_str;
    $this->view->JsApplication = $application;
    $content = $this->view->getContents('groups/gallery/xajax.edit.photo.tpl');
    
    $popup_window = Warecorp_View_PopupWindow::getInstance();        
    $popup_window->content($content);
    $popup_window->title(Warecorp::t('Edit Photo'));
    $popup_window->width(500)->height(350)->open($objResponse);
}
