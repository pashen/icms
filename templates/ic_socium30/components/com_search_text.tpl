<div class="photo_details">
<form id="sform"action="/index.php" method="GET" enctype="multipart/form-data" style="clear:both">
    <strong>{$LANG.SEARCH_ON_SITE}: </strong>
    <input type="hidden" name="view" value="search" />
    <input type="text" name="query" id="query" size="40" value="{$query}" class="text-input" />
    <select name="look" style="width:100px" onchange="$('form#sform').submit();	">
            <option value="allwords" {if $look=='allwords' || $look==''} selected="selected" {/if}>{$LANG.ALL_WORDS}</option>
            <option value="anyword" {if $look=='anyword' || $look==''} selected="selected" {/if}>{$LANG.ANY_WORD}</option>
            <option value="phrase" {if $look=='phrase' || $look==''} selected="selected" {/if}>{$LANG.PHRASE}</option>
    </select>
    <input type="submit" value="{$LANG.FIND}"/>
    <a href="javascript:" onclick="$('#content_box #from_search').fadeIn('slow');" class="ajaxlink">{$LANG.SEARCH_PARAMS}</a>
    <div id="from_search">
    <strong>{$LANG.WHERE_TO_FIND}:</strong>
	<table width="" border="0" cellspacing="0" cellpadding="3">
          {assign var="col" value="1"}
            {foreach key=tid item=enable_component from=$enable_components}
                {if $col==1} <tr> {/if}
                <td width="">
                <label id="l_{$enable_component.link}" {if in_array($enable_component.link, $from_component) || !$from_component}class="selected"{/if}>
                	<input name="from_component[]" onclick="toggleInput('l_{$enable_component.link}')" type="checkbox" value="{$enable_component.link}" {if in_array($enable_component.link, $from_component) || !$from_component}checked="checked"{/if} /> 
                    {$enable_component.title}</label></td>
                {if $col==5} </tr> {assign var="col" value="1"} {else} {math equation="x + 1" x=$col assign="col"} {/if}
            {/foreach}
            {if $col>1} 
                <td colspan="{math equation="x - y + 1" x=$col y=5}">&nbsp;</td></tr>
            {/if}
        </table>
        <p><strong>{$LANG.PUBDATE}:</strong></p>
        <select name="from_pubdate" style="width:200px">
          <option value="" {if !$from_pubdate}selected="selected"{/if}>{$LANG.ALL}</option>
          <option value="d" {if $from_pubdate=='d'}selected="selected"{/if}>{$LANG.F_D}</option>
          <option value="w" {if $from_pubdate=='w'}selected="selected"{/if}>{$LANG.F_W}</option>
          <option value="m" {if $from_pubdate=='m'}selected="selected"{/if}>{$LANG.F_M}</option>
          <option value="y" {if $from_pubdate=='y'}selected="selected"{/if}>{$LANG.F_Y}</option>
        </select>
        <label id="order_by_date" {if $order_by_date}class="selected"{/if}>
                	<input name="order_by_date" onclick="toggleInput('order_by_date')" type="checkbox" value="1" {if $order_by_date}checked="checked"{/if} /> 
                    {$LANG.SORT_BY_PUBDATE}</label>
        <div style="position:absolute; top:0; right:0; font-size:10px;">
        	<a href="javascript:" onclick="$('#content_box #from_search').fadeOut();" class="ajaxlink">{$LANG.HIDE}</a>
        </div>
        <div style="position:absolute; bottom:0; right:0; font-size:10px;">
        	<a href="javascript:" onclick="$('#sform input[type=checkbox]').attr('checked', 'checked');$('#from_search label').addClass('selected');" class="ajaxlink">{$LANG.SELECT_ALL}</a> | 
			<a href="javascript:" onclick="$('#sform input[type=checkbox]').attr('checked', '');$('#from_search label').removeClass('selected');" class="ajaxlink">{$LANG.REMOVE_ALL}</a>
        </div>
    </div>
</form>
</div>

{if $results}
	{assign var="num" value="1"}
	<p class="usr_photos_notice"><strong>{$LANG.FOUND} {$total|spellcount:$LANG.1_MATERIALS:$LANG.2_MATERIALS:$LANG.10_MATERIALS}</strong></p>
    {foreach key=tid item=item from=$results}
	<div class="search_block">
            {if $item.pubdate}
            	<div class="search_date">{$item.pubdate}</div>
            {/if}
            <div class="search_result_title">
                <span>{$num}</span>
                <a href="{$item.link}" target="_blank">{$item.s_title}</a>
            </div>
            <div class="search_result_desc">
            	{if $item.description}
            		<p>{$item.description}</p>
                {/if}
            <a href="{$item.placelink}">{$item.place}</a>
                &mdash; <span class="search_url">{$host}{$item.link}</span>
            </div>
     </div>
     {math equation="z + 1" z=$num assign="num"}
    {/foreach}
    {$pagebar}
{else}
	{if $query}
		<p class="usr_photos_notice">{$LANG.BY_QUERY} <strong>"{$query}"</strong> {$LANG.NOTHING_FOUND}. <a href="{$external_link}" target="_blank">{$LANG.FIND_EXTERNAL}</a></p>
    {/if}
{/if}
{literal}
<script type="text/javascript">

		function toggleInput(id){
			$('#from_search label#'+id).toggleClass('selected');
		}
		function paginator(page){
			$('form#sform').append('<input type="hidden" name="page" value="'+page+'" />');
			$('form#sform').submit();
		}
</script>
{/literal}