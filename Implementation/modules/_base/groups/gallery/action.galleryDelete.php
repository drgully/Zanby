<?php
    Warecorp::addTranslation('/modules/groups/gallery/action.galleryDelete.php.xml');
    
    $gallery_id = isset($this->params['gallery']) ? (int)floor($this->params['gallery']) : 0;
    
    if ($gallery_id == 0 || ! Warecorp_Photo_Gallery_Abstract::isGalleryExists($gallery_id)) {
        $this->_redirectError(Warecorp::t("Error. Invalid gallery id."));
    }
    
    $gallery = Warecorp_Photo_Gallery_Factory::loadById($gallery_id);
    
    if ( !Warecorp_Photo_AccessManager_Factory::create()->canDeleteGallery($gallery, $this->currentUser, $this->_page->_user) ) {
        $this->_redirect($this->currentUser->getUserPath('photos'));
    }
    
    $gallery->delete();
    
    /** Send notification to host **/
    $this->currentGroup->sendNewDataIsUploaded( $this->_page->_user, $gallery, "PHOTO", "DELETE", false );
    
//    if ($this->currentGroup->getPrivileges()->getSendEmail()) {
//        $mail = new Warecorp_Mail_Template('template_key', 'GROUP_NEW_DATA_IS_UPLOADED');
//        $mail->setHeader('Sender', '"'.htmlspecialchars($this->currentGroup->getName()).'" <'.$this->currentGroup->getGroupEmail().'>');
//        $mail->setHeader('Reply-To', '"'.htmlspecialchars($this->currentGroup->getName()).'" <'.$this->currentGroup->getGroupEmail().'>');
//        $mail->setSender($this->currentGroup);
//        $mail->addRecipient($this->currentGroup->getHost());
//        $mail->addParam('Group', $this->currentGroup);
//        $mail->addParam('action', "DELETE");
//        $mail->addParam('section', "PHOTO");
//        $mail->addParam('chObject', $gallery);
//        $mail->addParam('User', $this->_page->_user);
//        $mail->addParam('isPlural', false);
//        $mail->addParam('items', array());
//        $mail->sendToPMB(true);
//        $mail->send();
//    }
    /** --- **/
    
    $this->_redirect("/".$this->_page->Locale."/photos/");

