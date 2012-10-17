<div class="gcont">
<div class="gcont_t_l">
    <div class="gcont_t_r">
        <div class="gcont_t_bg">
            &nbsp;
        </div>
    </div>
</div>
<div class="gcont">
<div class="gcont_bg_l">
     <div class="gcont_bg_r">
          <div class="gcont_bg_bg">
               <div class="gcont_bg_cont">
<div class="{$mod.css_prefix}module">
    {if $mod.showtitle neq 0}
        <div class="{$mod.css_prefix}moduletitle">
            {$mod.title}
            {if $cfglink}
                <span class="fast_cfg_link">
                    <a href="javascript:moduleConfig({$mod.module_id})" title="Настроить модуль">
                        <img src="/templates/_default_/images/icons/settings.png"/>
                    </a>
                </span>
            {/if}
        </div>
    {/if}
    <div class="{$mod.css_prefix}modulebody">{$mod.body}</div>

</div>
</div>
</div>
</div>
</div>
</div>
<div class="gcont_bt_l">
    <div class="gcont_bt_r">
        <div class="gcont_bt_bg">
        &nbsp;
        </div>
    </div>
</div>
</div>