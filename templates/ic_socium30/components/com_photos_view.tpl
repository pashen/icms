{strip}
	{php}
		$item=$this->_tpl_vars['pagetitle'];
		$titdesc = explode("|", $item);	
	{/php}
<h1 class="con_heading">{php}echo $titdesc[0];{/php} {if $total_foto}({$total_foto}){/if}</h1>
	{if $id == $root.id && $cfg.showlat}
		<div class="line" style="width: 100%; overflow: hidden;">
			<div class="photo_toolbar">
				<ul>
					<li>
						<span>
							<img src="/templates/ic_socium30/images/icons/calendar.png" />
							<a href="/photos/latest.html">{$LANG.LAST_UPLOADED}</a>
						</span>
					</li>
					<li>
						<span>
							<img src="/templates/ic_socium30/images/icons/rating.png" />
							<a href="/photos/top.html">{$LANG.BEST_PHOTOS}</a>
						</span>
					</li>
				</ul>
			</div>
		</div>
	{/if}
	{if $is_subcats}
		<div class="album_list">
    	{if ($cfg.tumb_view == '2' ||  $cfg.tumb_view == '3') && (!$album.NSDiffer || !$cfg.tumb_club)}
        {assign var="col" value="1"}
        	{foreach key=tid item=cat from=$subcats}
            {if $col==1}<div class="photo_row">{/if}
            	<div class="photo_album_tumb">
                	<div class="photo_container">
                    	{if $cat.iconurl}
                    	<a href="/photos/{$cat.id}"><img class="photo_album_img" src="/images/photos/small/{$cat.iconurl}" alt="{$cat.title|escape:'html'}" border="0" /></a>
                        {else}
                        <a href="/photos/{$cat.id}"><img class="photo_album_img" src="/images/photos/no_image.png" alt="{$cat.title|escape:'html'}" border="0" width="{$cat.thumb1}px" /></a>
                        {/if}
                    </div>
                    <div class="photo_txt">
                    	<ul>
                        	<li class="photo_album_title"><a href="/photos/{$cat.id}">{$cat.title}</a> ({$cat.content_count}{if $cat.subtext} {$cat.subtext}{/if})</li>
                            {if $cat.description}<li class="photo_album_desc"><a href="/photos/{$cat.id}">{$cat.description}</a></li>{/if}
                        </ul>
                    </div>
                    {if $cat.today_count}<div class="photo_container_today">+{$cat.today_count}</div>{/if}
                </div>
             
             {if $col==$cfg.maxcols}<div class="blog_desc"></div></div> {assign var="col" value="1"} {else} {math equation="z + 1" z=$col assign="col"}  {/if}
             
            {/foreach}
            {if $col>1} 
                </div>
            {/if}
        {else}
            {assign var="col" value="1"}
            <table class="categorylist" style="margin-bottom:10px" cellspacing="3" width="100%" border="0">
            {foreach key=tid item=cat from=$subcats}
                {if $col==1} <tr> {/if}
                    <td width="20" valign="top" style="padding-top:5px">
                        <img src="/templates/ic_socium30/images/icons/folder.png" border="0" />
                    </td>
                    <td width="" valign="top">
                       <div><a href="/photos/{$cat.id}" class="photo_subcat">{$cat.title}</a> ({$cat.content_count}{$cat.subtext})</div>
                        {if $cat.description} <div>{$cat.description}</div>{/if}
                    </td>
                    {if $col==$maxcols} </tr> {assign var="col" value="1"} {else} {math equation="x + 1" x=$col assign="col"} {/if}
            {/foreach}
            {if $col>1} 
                <td colspan="{math equation="x - y + 1" x=$col y=$maxcols}">&nbsp;</td></tr>
            {/if}
            </table>
    	{/if}
	</div>
    {/if}
<br/><br/>
{if $can_add_photo}
	<div class="photo_add_link">
		<span>
			<a class="photo_add_link" href="/photos/{$album.id}/addphoto.html">{$LANG.ADD_PHOTO_TO_ALBUM}</a>
		</span>
	</div>
	{/if}
		
{if $cons}
		{if $album.showtype == 'list'}
			{assign var="col" value="1"}
                <table width="100%" cellpadding="0" cellspacing="0" border="0">
					{foreach key=tid item=con from=$cons}
						{if $col==1} <tr> {/if}
							<td width="20" valign="top"><img src="/images/markers/photo.png" border="0" /></td>
							<td width="" valign="top">
									<a href="/photos/photo{$con.id}.html">{$con.title}</a>
							</td>	
							 {if $album.showdate}
								{assign var="fcols" value="6"}
								<td width="16" valign="top"><img src="/images/icons/comments.gif" alt="{$LANG.COMMENTS}" border="0"/></td>
								<td width="25" valign="top"><a href="/photos/photo{$con.id}.html#c" title="{$LANG.COMMENTS}">{$con.commentscount}</a></td>
								<td width="16" valign="top" class="photo_date_td"><img src="/images/icons/date.gif" alt="{$LANG.PUB_DATE}" /></td>
								<td width="70" align="center" valign="top" class="photo_date_td">{$con.fpubdate}</td>			
							 {else} 
								{assign var="fcols" value="2"}
							 {/if}
                             
               			{if $col==$maxcols_foto} </tr> {assign var="col" value="1"} {else} {math equation="x + 1" x=$col assign="col"} {/if}
                        {/foreach}
                        {if $col>1} 
                            <td colspan="{math equation="((x - y + 1) * z)" x=$col y=$maxcols_foto z=$fcols}">&nbsp;</td></tr>
                        {/if}
				</table>
       	{/if}
		{if $album.showtype != 'list'}
        	{assign var="col" value="1"}
			<div class="photo_gallery">
				<table cellpadding="0" cellspacing="0" border="0">
					{foreach key=tid item=con from=$cons}
						{if $col==1} <tr> {/if}
                        <td align="center" valign="middle" width="{math equation="100/x" x=$maxcols_foto}%">
							<div class="{$album.cssprefix}photo_thumb">
							<table width="100%" height="100" cellspacing="0" cellpadding="4">
							  	<tr>
							  		<td class="photo_container" valign="middle" align="center" >
										<a class="lightbox-enabled" rel="lightbox-galery" href="{$con.photolink}" title="{$con.title|escape:'html'}">
											<img class="photo_thumb_img" src="/images/photos/small/{$con.file}" alt="{$con.title|escape:'html'}" border="0" />
										</a>
                                	</td>
                                </tr>
							</table>
								<div class="photo_album_desc"><a href="{$con.photolink2}" title="{$con.title|escape:'html'}">{$con.title|truncate:18}</a></div>
								{if $con.published == 0}
								<div class="photo_moderation" id="moder{$con.id}">
                                	<div style="margin-top:4px">{$LANG.WAIT_MODERING}</div>
										<div><a href="javascript:publishPhoto({$con.id})" style="font-size: 11px; color:green">{$LANG.PUBLISH}</a> | <a href="/photos/delphoto{$con.id}.html" style="font-size: 11px; color:red">{$LANG.DELETE}</a></div>
									</td>
								</div>						
								{/if}
							</div>
						</td>
                    {if $col==$maxcols_foto} </tr> {assign var="col" value="1"} {else} {math equation="x + 1" x=$col assign="col"} {/if}
                    {/foreach}
                    {if $col>1} 
                        <td colspan="{math equation="x - y + 1" x=$col y=$maxcols_foto}">&nbsp;</td></tr>
                    {/if}
					</table>
				</div>
			{/if}
{else}
{if $album.parent_id > 0}<p>{$LANG.NOT_PHOTOS_IN_ALBUM}</p>{/if}       
{/if}
                    
{$pagebar}

{/strip}