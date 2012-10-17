{if $is_last_reg}
	{if $cfg.view_type == 'table'}
		<div class="new_user_list">
			{foreach key=aid item=usr from=$usrs}
				{php}
					if($i<$this->_tpl_vars['cfg']['maxcool']): $i++; 
				{/php}
				<div class="new_user_item">
					<div class="line">
						<div class="new_user_img"><a href="{profile_url login=$usr.login}">{$usr.avatar}</a></div>
					</div>
					<div class="line">
						<div class="new_user_title">{$usr.nickname|truncate:10}</div>
					</div>
				</div>
				{php}
					endif;
				{/php}
			{/foreach}
			<div class="clear"></div>
		</div>
     {/if}
	 
	{if $cfg.view_type == 'hr_table'}
    	{assign var="col" value="1"}
        <table cellspacing="5" border="0">
              {foreach key=aid item=usr from=$usrs}
				{if $col==1} <tr> {/if}
						<td width="20" class="new_user_avatar" align="center" valign="middle"><a href="{profile_url login=$usr.login}" class="new_user_link" title="{$usr.nickname|escape:'html'}">{$usr.avatar}</a><div class="mod_new_user_link"><a href="{profile_url login=$usr.login}">{$usr.nickname}</a></div>
                        </td>
				{if $col==$cfg.maxcool} </tr> {assign var="col" value="1"} {else} {math equation="x + 1" x=$col assign="col"} {/if}
              {/foreach}
        </table>
     {/if}
	 
     {if $cfg.view_type == 'list'}
     	{assign var="now" value="0"}
     		{foreach key=aid item=usr from=$usrs}
            	<a href="{profile_url login=$usr.login}" class="new_user_link">{$usr.nickname}</a>
                {math equation="x + 1" x=$now assign="now"}
                {if $now==$total}{else} ,{/if}
            {/foreach}
            <p><strong>{$LANG.LASTREG_TOTAL}:</strong> {$total_all}</p>
     {/if}
	 
{else}            
<p>{$LANG.LASTREG_NOT_DATA}</p>
{/if}
