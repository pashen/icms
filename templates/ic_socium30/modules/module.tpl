<div class="{$mod.css_prefix}module">
    {if $mod.showtitle neq 0}
        <div class="moduletitle">
            <p>{$mod.title}</p>
            {if $cfglink}
                <span class="fast_cfg_link">
                    <a href="javascript:moduleConfig({$mod.module_id})" title="Настроить модуль">
                        <img src="/templates/ic_socium30/images/icons/settings.png"/>
                    </a>
                </span>
            {/if}
        </div>
    {/if}
	<div class="modulebody">{$mod.body}</div>
</div>
