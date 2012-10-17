<h1 class="con_heading">{$LANG.USERS}</h1>
	<div id="users_search_link">
		<a href="javascript:void(0)" onclick="{literal}$('#users_sbar').slideToggle();{/literal}">
			<span>{$LANG.USERS_SEARCH}</span>
		</a>
	</div>
    {if $cfg.sw_search}    
    <div id="users_sbar" style="display:none;">
        <form name="usr_search_form" method="post" action="/users/search.html">
            <table cellpadding="2">
                <tr>
                    <td width="80">{$LANG.FIND}: </td>
                    <td width="170">
                        <select name="gender" id="gender" class="field" style="width:150px">
                            <option value="f">{$LANG.FIND_FEMALE}</option>
                            <option value="m">{$LANG.FIND_MALE}</option>
                            <option value="0" selected>{$LANG.FIND_ALL}</option>
                        </select>
                    </td>
                     <td width="80">{$LANG.AGE_FROM}</td>
                     <td>
                        <input style="width:60px" name="agefrom" type="text" id="agefrom" value="18"/>
                        {$LANG.TO}
                        <input style="width:60px" name="ageto" type="text" id="ageto" value=""/>
                     </td>
                </tr>
                <tr>
                </tr>
                <tr>
                     <td>
                         {$LANG.NAME}
                     </td>
                     <td>
                        <input style="width:150px" id="name" name="name" class="field" type="text" value=""/>
                        <script type="text/javascript">
                            {$autocomplete_js}
                        </script>
                     </td>
                      <td>
                         {$LANG.CITY}
                     </td>
                     <td>
                        <input style="width:150px" id="city" name="city" class="field" type="text" value=""/>
                        <script type="text/javascript">
                            {$autocomplete_js}
                        </script>
                     </td>
                </tr>
                <tr>
                </tr>
                <tr>
                     <td>{$LANG.HOBBY}</td>
                     <td colspan="3">
                        <input style="" id="hobby" class="longfield" name="hobby" type="text" value=""/>
                     </td>
                </tr>
            </table>
            <p>
                <input class="button" name="gosearch" type="submit" id="gosearch" value="{$LANG.SEARCH}" />
                <input class="button" name="hide" type="button" id="hide" value="{$LANG.HIDE}" onclick="{literal}$('#users_sbar').slideToggle();{/literal}"/>
            </p>
        </form>
    </div>
    {/if}

    {if $querymsg}
        <div class="users_search_results">{$querymsg}</div>
    {/if}

	<div class="line">
		<div class="users_list_buttons">
		<div class="button round4 {if $link.selected=='latest'}selected{/if}"><a rel=”nofollow” href="{$link.latest}">{$LANG.LATEST}</a></div>
        <div class="button round4 {if $link.selected=='positive'}selected{/if}"><a rel=”nofollow” href="{$link.positive}">{$LANG.POSITIVE}</a></div>
		<div class="button round4 {if $link.selected=='rating'}selected{/if}"><a rel=”nofollow” href="{$link.rating}">{$LANG.RATING}</a></div>					
	</div>
	<div class="users_list">
		{if $is_users}
			{foreach key=tid item=usr from=$users}								
				<div class="line">
					<div class="avatar">{$usr.avatar}</div>
                    {if $link.selected=='rating'}
                        <div class="rating round4" title="{$LANG.RATING}">{$usr.rating}</div>
                    {/if}
					{if $link.selected=='positive'}
                         <div title="{$LANG.KARMA}" class="round4 karma{if $usr.karma > 0} pos{/if}{if $usr.karma < 0} neg{/if}">{if $usr.karma > 0}+{/if}{$usr.karma}</div>
                    {/if}
                    <div class="status">{$usr.status}</div>
					<div class="nickname">
						{$usr.nickname}
						{if $usr.microstatus}
							<div class="microstatus">{$usr.microstatus}</div>
						{/if}
					</div>
                </div>
			{/foreach}		
		{else}
			<div class="line">
				<p>{$LANG.USERS_NOT_FOUND}.</p>
			</div>
		{/if}
	</div>
		{if (isset($pagebar) && ($orderby!='karma'||$orderto!='asc'))} {$pagebar}	{/if}
	</div>		