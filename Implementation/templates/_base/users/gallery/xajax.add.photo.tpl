<!-- user content -->
<div id="errors">
</div>

<div class="prInnerTop">
	<input type="radio" name="addPhotoMode" id="addPhotoMode1" value="1" /><label for="addPhotoMode1"> {t}Add photo to the following gallery{/t}</label>
</div>
<div class="prInnerLeft prInnerSmallTop">
	<select name="addPhotoGalleryExist" id="addPhotoGalleryExist" class="prLargeFormItem">
		{foreach from=$galleries item=g}
		<option value="{$g->getId()}">{$g->getTitle()|escape:html}</option>
		{/foreach}
	</select>
</div>
<div class="prInnerTop">		
	<input type="radio" name="addPhotoMode" id="addPhotoMode2" value="2" /><label for="addPhotoMode2"> {t}Save photo as new gallery{/t}</label>
</div>	
<div class="prInnerLeft prInnerSmallTop">
	<input class="prLargeFormItem" type="text" name="addPhotoGalleryNew" id="addPhotoGalleryNew" maxlength="100" />
</div>
	

<div class="prInnerTop prTCenter">    
   <a class="prButton" href="#null" onclick="{$JsApplication}.showAddPhotoHandle({$gallery->getId()}, {$photo->getId()})"><span>{t}Add Photo{/t}</span></a>  
    {t}or{/t} <a href="#null" onclick="{$JsApplication}.hideAddPanel(); return false;"><span>{t}Cancel{/t}</span></a> 
</div>
<!-- /user content -->
