{if $users}
    <div class="new_user_list">
        {foreach key=id item=user from=$users}
            <div style="position: relative; float: left; padding: 10px;">
				{if $cfg.show_awards}
                    <div style="">
                        {foreach key=id item=award from=$user.awards}
                            <img src="/templates/ic_socium30/images/icons/award.png" border="0" title="{$award.title|escape:'html'}" />
                        {/foreach}
                    </div>
                {/if}
                <div class="new_user_img"><img src="{$user.avatar}" /></div>
                <div class="new_user_link">
                    <a href="{profile_url login=$user.login}#upr_awards" title="{$user.nickname|escape:'html'}">{$user.nickname}</a>
                </div>
            </div>
        {/foreach}
    </div>
{else}
    <p>Нет достойных.</p>
{/if}