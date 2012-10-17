{* ================================================================================ *}
{* ========================= Главная страница каталога ============================ *}
{* ================================================================================ *}

{if $cfg.is_rss}
	{* ============================== Заголовок + RSS ==================================== *}
	<table cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td><h1 class="con_heading">{$title}</h1></td>
			<td valign="top" style="padding-left:6px">
                <div class="con_rss_icon">
                    <a href="/rss/video/{$cat.id}/feed.rss" title="{$LANG.RSS}"><img src="/images/markers/rssfeed.png" border="0" alt="{$LANG.RSS}"/></a>
                </div>
			</td>
		</tr>
	</table>
{else}
	{* ============================== Просто заголовок ==================================== *}
	<h1 class="con_heading">{$title}</h1>
{/if}



{if $cats_html}
    {$cats_html}
{else}
    {$LANG.NO_CAT_IN_CATALOG}
{/if}

<ul class="butt_m">
    <li id="m1" class="m1"></li>
    <li id="m2" class="m2"><a href="#" id="link_pop">Популярное</a></li>
    <li id="m3" class="m3"></li>
    <li id="m4" class="m4"><a href="#" id="link_last">Новое</a></li>
    <li id="m5" class="m5"></li>
</ul>
<div style="clear: both;"></div>

<div id="pop" style="display:block;">{php}cmsModule('video1');{/php}</div>
<div id="last" style="display:none;">{php}cmsModule('video2');{/php}</div>


<script>
    {literal}
    $(document).ready(function(){
        $('#link_pop').click(function(){

            $('#pop').css('display','block');
            $('#last').css('display','none');
            $('.butt_m li').removeClass();
            $('#m1').addClass('m1');
            $('#m2').addClass('m2');
            $('#m3').addClass('m3');
            $('#m4').addClass('m4');
            $('#m5').addClass('m5');
            return false;
        });
        $('#link_last').click(function(){

            $('#pop').css('display','none');
            $('#last').css('display','block');
            $('.butt_m li').removeClass();
            $('#m1').addClass('m11');
            $('#m2').addClass('m22');
            $('#m3').addClass('m33');
            $('#m4').addClass('m44');
            $('#m5').addClass('m55');
            
            return false;
        });
    });

    {/literal}
</script>