{* ================================================================================ *}
{* ================ Cписок [под]рубрик универсального каталога ==================== *}
{* ================================================================================ *}
<div class="video_buttons">

    <a href="/video/add.html" class="add_video">Добавить видео</a>
    {if $is_user}<a href="/video/myvideo.html" class="my_video">Мое видео</a>{/if}
<div style="clear: both;"></div>
</div>
<div class="border_video">
    <ul class="vid_cat_list">
        {foreach key=tid item=cat from=$cats}
            <li class="vid_cat_item"><a href="/video/{$cat.id}">{$cat.title} ({$cat.content_count})</a></li>
        {/foreach}
    </ul>
</div>