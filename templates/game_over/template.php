<?php
    if(!defined('VALID_CMS')) { die('ACCESS DENIED'); }
    $inUser = cmsUser::getInstance();
    $inCore = cmsCore::getInstance();

    $mod_count['top']   = cmsCountModules('top');
    $mod_count['sidebar']  = cmsCountModules('sidebar');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!-- HEAD !-->
    <?php cmsPrintHead(); ?>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251"/>
    <?php if($inUser->is_admin){ ?>
        <script src="/admin/js/modconfig.js" type="text/javascript"></script>
        <script src="/templates/game_over/js/nyromodal.js" type="text/javascript"></script>
        <link href="/templates/game_over/css/modconfig.css" rel="stylesheet" type="text/css" />
        <link href="/templates/game_over/css/nyromodal.css" rel="stylesheet" type="text/css" />
    <?php } ?>
    <link href="/templates/game_over/css/text1.css" rel="stylesheet" type="text/css" />
    <link href="/templates/game_over/css/960.css" rel="stylesheet" type="text/css" />
    <link href="/templates/game_over/css/styles.css" rel="stylesheet" type="text/css" />
    <link href="/templates/game_over/css/grid.css" rel="stylesheet" type="text/css" />
    <link href="/templates/game_over/css/module.css" rel="stylesheet" type="text/css" />
    <link href="/templates/game_over/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="/templates/game_over/css/photos.css" rel="stylesheet" type="text/css" />
    <link href="/templates/game_over/css/users.css" rel="stylesheet" type="text/css" />
    <link href="/templates/game_over/css/forum.css" rel="stylesheet" type="text/css" />
    <link href="/templates/game_over/css/board.css" rel="stylesheet" type="text/css" />
    <link href="/templates/game_over/css/shop.css" rel="stylesheet" type="text/css" />
    <link href="/templates/game_over/css/action.css" rel="stylesheet" type="text/css" />
    <link href="/templates/game_over/css/comment.css" rel="stylesheet" type="text/css" />
    <link href="/templates/game_over/css/club.css" rel="stylesheet" type="text/css" />
    <link href="/templates/game_over/css/blog.css" rel="stylesheet" type="text/css" />

<link media="screen" href="/templates/game_over/css/style.css" type="text/css" rel="stylesheet" />

</head>

<body>
 <div id="wrapper">
<div class="container_12">
<div id="top">
	<div class="content">
    	<div class="logo">&nbsp;</div>
        <div class="banner">
	<div align="center">

                    <?php if (!$inUser->id){ ?>

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
                        <div class="mod_user_menu">
                            <span class="register"><a href="/registration">Регистрация</a></span>
                            <span class="login"><a href="/login">Вход</a></span>
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
                    <?php } else { ?>
                        <?php cmsModule('header'); ?>
                    <?php } ?>

	</div>
</div></div>
        <div style="clear:both;"></div>
        	<table class="menu_block" width="100%" cellpadding="0" cellspacing="0">
            	<tr>
                <td class="menu">
                            <div class="menu_l">
                                <div class="menu_r">
                                    <div class="menu_bg" id="topmenu">
                   <?php cmsModule('topmenu'); ?>
                                    <div class="clear"></div></div>
                                    </div>
                                </div>
                            </div>
                  </td>
                  <td class="soc_menu_block">
                                <div class="soc_menu_r">
                                    <div class="soc_menu_bg">
                                        <ul class="soc_menu">
                                            <li><a class="rss" href="#">&nbsp;</a></li>
                                            <li><a class="eml" href="#">&nbsp;</a></li>
                                            <li><a class="twet" href="#">&nbsp;</a></li>
                                            <li><a class="face" href="#">&nbsp;</a></li>
                                            <li><a class="vk" href="#">&nbsp;</a></li>
                                        </ul>
                                    </div>
                                </div>
                    </td>
                </tr>
                </table>

<div id="page">

            <?php if ($mod_count['top']){ ?>
            <div class="clear"></div>

            <div id="topwide" class="container_12">
                <div class="grid_12" id="topmod"><?php cmsModule('top'); ?></div>
            </div>
            <?php } ?>

                <div id="pathway" class="container_12">
                    <div class="grid_12"><?php cmsPathway('&rarr;'); ?></div>
                </div>

            <div class="clear"></div>

            <div id="mainbody" class="container_12">
                <div id="main" class="<?php if ($mod_count['sidebar']) { ?>grid_8<?php } else { ?>grid_12<?php } ?>">
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
                    <?php cmsModule('maintop'); ?>

                    <?php $messages = cmsCore::getSessionMessages(); ?>
                    <?php if ($messages) { ?>
                    <div class="sess_messages">
                        <?php foreach($messages as $message){ ?>
                            <?php echo $message; ?>
                        <?php } ?>
                    </div>
                    <?php } ?>

                    <?php cmsBody(); ?>
                    <?php cmsModule('mainbottom'); ?>
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
                </div>

                <?php if ($mod_count['sidebar']) { ?>
                    <div class="grid_4" id="sidebar"><?php cmsModule('sidebar'); ?></div>
                <?php } ?>
            </div>


<div class="clear"></div>
</div>
 <div id="wrapper">
        <div class="container_12">
                	<div class="gcont_t_l">
                        <div class="gcont_t_r">
                            <div class="gcont_t_bg">
                            	&nbsp;

                            </div>
                        </div>
                    </div>
                    
                     <div class="gcont_bg_l">
                        <div class="gcont_bg_r">
                            <div class="gcont_bg_bg">
                            	<div class="gcont_bg_cont">
                                    <div class="fotter_block">
                                    	<div style="float:left;">

                                        <b>Все права не защитить...</b><br />
                                        Сделано <a href="/"><span>Студия Два КоТа</span></a> &copy;
                                        </div>
                                        <div style="float:right;">
                                          <p>
                                                              <a href="http://www.instantcms.ru/" title="Работает на InstantCMS">
                    <img src="/templates/_default_/images/b88x31.gif" border="0"/>
                </a>
                                            </p>
                                        </div>

                                        <div class="clear"></div>
                                     </div>
                                 </div>
                            </div>
                        </div>
                     </div>
                    <div class="gcont_bt_l"><div class="gcont_bt_r"><div class="gcont_bt_bg">
                            	&nbsp;
                    </div></div></div>
        </div></div>
    </div></div></div>
        </div>

</div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#topmenu .menu li').hover(
                function() {
                    $(this).find('ul:first').show();
                    $(this).find('a:first').addClass("hover");
                },
                function() {
                    $(this).find('ul:first').hide();
                    $(this).find('a:first').removeClass("hover");
                }
            );
        });
    </script>

</body>
</html>