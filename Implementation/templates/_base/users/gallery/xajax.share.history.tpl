<!-- user content -->
<label>{t}{tparam value=$gallery->getTitle()|escape:html}Share history for %s{/t}</label>
{form from=$unshareForm id="unshareForm"}
{form_hidden name="gallery_id" value=$gallery->getId()}
{form_hidden name="JsApplication" value=$JsApplication}
<div style="overflow:auto; overflow-y:auto;  overflow-x:hidden; height:180px;">
<table cellpadding="0" cellspacing="0" border="0" width="100%">
	{foreach from=$history item=hrow}
	<tr>
		<td><input type="checkbox" name="history[]" value="{$hrow.id}"></td>
		<td>{t}Entire Gallery{/t}</td>
		<td>{$hrow.recipients|escape:html}</td>
		<td>{$hrow.share_date|user_date_format:$user->getTimezone()}</td>
	</tr>
	{/foreach}
</table>
</div>
{/form}
<!-- popup -->
{*popup_item*}
<div class="co-buttons-pannel-pop">
<div style="margin-left: -83px;">
    <!-- minus half of buttons width to center them -->
    <div class="co-button" onclick="{$JsApplication}.showShareHistoryHandle(); return false;" onmouseover="this.className = 'co-button co-btn-active'" onmouseout="this.className = 'co-button'"><a href="#null">{t}Unshare selected{/t}</a></div>
    <div class="co-button" onclick="{$JsApplication}.hideSharePanel(); return false;" onmouseover="this.className = 'co-button co-btn-active'" onmouseout="this.className = 'co-button'"><a href="#null">{t}Cancel{/t}</a></div>
</div>
{*popup_item*}
<!-- /popup -->
<!-- /user content -->
