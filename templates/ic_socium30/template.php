<?php
    if(!defined('VALID_CMS')) { die('ACCESS DENIED'); }

/*Блок "Powered by"*/
	$templ['powered'] = 1;	/*Включение и отключение блока ссылок на сайты производителей шаблона и CMS
							1-отбражается, 0-скрыт от глаз посетителя. Полное удаление блока запрещено!*/						

	$templ['full'] = 1;		/*Принудительный одноколоночный режим. Дать все пространство шаблона компонентам "Форум" и "Пользователи".
							1-левая колонка не отображается на страницах форума и пользователей, даже если в ней выведены модули.
							0-отлючение одноколоночного режима для страниц форума и пользователей*/
	
	$templ['head'] = 1;           /*Фиксированное положение шапки сайта. 
							1-при прокрутке шапка остается в верхней части страницы
				                        0-шапка прокручивается вместе со страницей
							При включении данной опции могуг возникнуть проблемы с отображением:
							-некоторые версии браузеров могут отображать шапку с артефактами
							-при определенных обстоятельствах объекты с большим z-index могут наезжать на шапку
							Рекомендуется влючать данную функцию, если данные проблемы были устранены*/
							

/*Tabber*/

	$tabber['status'] = 1;  /*Статус блока с вкладками, 0-отключен, 1-показывать только на главной, 2-показывать на всех страницах.*/

	$tabber['name1'] = "Пользователи"; /*Название 1-ой вкладки.*/
	$tabber['tab1'] = 100; 	/*Ширина одного модуля во вкладке. Измеряется в %. Чтобы использовать всю ширину вкладки, вводите 100.*/
	
	$tabber['name2'] = "Фото на сайте"; /*Название 2-ой вкладки.*/
	$tabber['tab2'] = 50;	/*Ширина одного модуля во вкладке. Измеряется в %. Чтобы использовать всю ширину вкладки, вводите 100.*/
	
	$tabber['name3'] = "Радио";	/*Название 3-ей вкладки.*/
	$tabber['tab3'] = 100;	/*Ширина одного модуля во вкладке. Измеряется в %. Чтобы использовать всю ширину вкладки, вводите 100.*/
	
	$tabber['name4'] = "Лента активности";	/*Название 4-ой вкладки.*/
	$tabber['tab4'] = 100;	/*Ширина одного модуля во вкладке. Измеряется в %. Чтобы использовать всю ширину вкладки, вводите 100.*/
	
	$tabber['name5'] = "СМС";	/*Название 5-ой вкладки.*/
	$tabber['tab5'] = 100;	/*Ширина одного модуля во вкладке. Измеряется в %. Чтобы использовать всю ширину вкладки, вводите 100.*/
	
					
/*******************************************************************************/
?>


<?php
    $inUser = cmsUser::getInstance();
    $inCore = cmsCore::getInstance();
	$inConf = cmsConfig::getInstance();
	
	if(cmsCountModules('left')){ $col['left_col']="1"; } 
	
	if ($templ['full']==1){ 
		if ((substr_count($_SERVER['REQUEST_URI'], 'forum')) or (substr_count($_SERVER['REQUEST_URI'], 'users')))  { 
			$col['left_col']="0";	
			$col['user_menu']="1";
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php cmsPrintHead(); ?>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251"/>
    <?php if($inUser->is_admin){ ?>
        <script src="/admin/js/modconfig.js" type="text/javascript"></script>
        <script src="/templates/ic_socium30/js/nyromodal.js" type="text/javascript"></script>
        <link href="/templates/ic_socium30/css/modconfig.css" rel="stylesheet" type="text/css" />
        <link href="/templates/ic_socium30/css/nyromodal.css" rel="stylesheet" type="text/css" />
    <?php } ?>
	<script src="/templates/ic_socium30/js/template.js" type="text/javascript"></script>
    <link href="/templates/ic_socium30/css/reset.css" rel="stylesheet" type="text/css" />
    <link href="/templates/ic_socium30/css/text.css" rel="stylesheet" type="text/css" />
	<link href="/templates/ic_socium30/css/template.css" rel="stylesheet" type="text/css" /> 
	<link href="/templates/ic_socium30/css/styles.css" rel="stylesheet" type="text/css" />
	<link href="/templates/ic_socium30/css/color.css" rel="stylesheet" type="text/css">
	<link href="/templates/ic_socium30/css/video.css" rel="stylesheet" type="text/css" /

	<?php if($templ['head']==1){ ?>
		<style rel="stylesheet" type="text/css">
			#header_box{
				position: fixed;
			}
			
			body, #wrap_100{
				background-attachment: fixed;
			}
		</style>
	<?php } ?>
	
	<!--[if lt IE 7]>
		<link type='text/css' href='/templates/ic_socium30/css/ie6.css' rel='stylesheet' />
	<![endif]-->
	
    <script language="JavaScript">
    <!--
    var tit = document.title;
    var c = 0;
    function writetitle()
    {
    document.title = tit.substring(0,c);
    if(c==tit.length)
    {
    c = 0;
    setTimeout("writetitle()", 2000)
    }
    else
    {
    c++;
    setTimeout("writetitle()", 150)
    }
    }
    writetitle()
    //-->
    </script>

</head>

<body>
	<div id="wrap_100">

               <!--Banners-->

                <div id="advBgBannerLeft" style="display: block; width: 295.5px; right: 1287.5px; left: 0px;">
                   <div style="background:url(/images/banners/1left-achdo.jpg) 100% 0 no-repeat">
                      <a target="_blank" href="/"> </a>
                   </div>
                </div>
                <div id="advBgBannerRight" style="display: block; width: 295.5px; left: 1287.5px;">
                 <div style="background:url(/images/banners/1right-achdo.jpg) 0 0 no-repeat">
                    <a target="_blank" href="/"> </a>
                 </div>
                </div>
		<!--Header-->
	
		<div id="header_box">
			<div id="header">
                                <div id="head0">
                                        <?php cmsModule('head0'); ?>
                                </div>
				<div id="logo">
					<a id="logo" href="/" title="<?php cmsPrintSitename(); ?>"></a>
				</div>
				<div id="slider">
						<?php cmsModule('slider'); ?>
				</div>
				<div id="two_menu_box">
					<div id="main_menu_box">
						<div id="main_menu">
							<?php cmsModule('main_menu'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!--end header-->
		
 		<div id="wrapbg">
			<div id="wrap_box">
				<?php if(cmsCountModules('banner1')) { ?>
					<div id="banner1"><?php cmsModule('banner1'); ?></div>
				<?php } ?>
				<?php if($inCore->menuId()!==1){ ?>
					<div id="pathway_box" class="round4">
						<div id="pathway">
							<?php 
								if ($inConf->short_pw){ unset($this->pathway[sizeof($this->pathway)-1]); } 
								if (is_array($this->pathway)){
									echo '<div class="pathway">';
										foreach($this->pathway as $key => $value){
											echo '<a href="'.$this->pathway[$key]['link'].'" class="pathwaylink">';
											$pathtemp = $this->pathway[$key]['title'];
											$pathname = explode("|",$pathtemp);	
											echo $pathname[0].'</a> ';
											if ($key<sizeof($this->pathway)-1) {
												echo ' -> ';
											}
										}
									echo '</div>';
								}
							?>
						</div>
					</div>
				<?php } ?>
				<?php if(cmsCountModules('search')) { ?>
					<div id="search_pos">
						<?php cmsModule('search'); ?>
					</div>
				<?php } ?>
				<?php if(cmsCountModules('banner2')) { ?>
					<div id="banner2">
						<?php cmsModule('banner2'); ?>
					</div>
				<?php } ?>
			<!--main columns-->
			
				<div id="columns">
					<div id="main_column_wrap<?php echo $col['left_col'];?>">
					
					<!--main left column-->
					
						<div id="main_column<?php echo $col['left_col'];?>">
			
						
						<!--Tabber-->
							
							<?php if ($tabber['status']==1 and ($inCore->menuId()==1) or $tabber['status']==2) { 	?>
								<div id="tabber_wrap">
									<div id="tabber">
										<div id="tabber_switcher">
											<?php	if ($tabber['name1'] !== ""){
												echo "<a id='tabber_title1' href='#tabber_tab1' class='tabber_title active'><span>".$tabber['name1']."</span></a>";
											} 
											if ($tabber['name2'] !== ""){
												echo "<a id='tabber_title2' href='#tabber_tab2' class='tabber_title'><span>".$tabber['name2']."</span></a>";
											}
											if ($tabber['name3'] !== ""){
												echo "<a id='tabber_title3' href='#tabber_tab3' class='tabber_title'><span>".$tabber['name3']."</span></a>";
											}
											if ($tabber['name4'] !== ""){
												echo "<a id='tabber_title4' href='#tabber_tab4' class='tabber_title'><span>".$tabber['name4']."</span></a>";
											}
											if ($tabber['name5'] !== ""){
												echo "<a id='tabber_title5' href='#tabber_tab5' class='tabber_title'><span>".$tabber['name5']."</span></a>";
											} ?>
										</div>
										<?php	
										if ($tabber['name1'] !== ""){ 
											if ($tabber['tab1'] !== 100){ ?>
												<style type="text/css">
													#tabber_tab1 .module, #tabber_tab1 .clear_module{ width: <?php echo ($tabber['tab1']-1); ?>%; float:left; }
												</style>
											<?php } ?>
											<div id="tabber_tab1" class="tabber_tab"><?php cmsModule('tab1') ?></div>
										<?php } 
										if ($tabber['name2'] !== ""){ 
											if ($tabber['tab2'] !== 100){ ?>
												<style type="text/css">
													#tabber_tab2 .module, #tabber_tab2 .clear_module{ width: <?php echo ($tabber['tab2']-1); ?>%; float:left; }
												</style>
											<?php } ?>
											<div id="tabber_tab2" class="tabber_tab"><?php cmsModule('tab2') ?></div>
										<?php }
										if ($tabber['name3'] !== ""){ 
											if ($tabber['tab3'] !== 100){ ?>
												<style type="text/css">
													#tabber_tab3 .module, #tabber_tab3 .clear_module{ width: <?php echo ($tabber['tab3']-1); ?>%; float:left; }
												</style>
											<?php } ?>
											<div id="tabber_tab3" class="tabber_tab"><?php cmsModule('tab3') ?></div>
										<?php }
										if ($tabber['name4'] !== ""){ 
											if ($tabber['tab4'] !== 100){ ?>
												<style type="text/css">
													#tabber_tab4 .module, #tabber_tab4 .clear_module{ width: <?php echo ($tabber['tab4']-1); ?>%; float:left; }
												</style>
											<?php } ?>
											<div id="tabber_tab4" class="tabber_tab"><?php cmsModule('tab4') ?></div>
										<?php }
										if ($tabber['name5'] !== ""){ 
											if ($tabber['tab5'] !== 100){ ?>
												<style type="text/css">
													#tabber_tab5 .module, #tabber_tab5 .clear_module{ width: <?php echo ($tabber['tab5']-1); ?>%; float:left; }
												</style>
											<?php } ?>
											<div id="tabber_tab5" class="tabber_tab"><?php cmsModule('tab5') ?></div>
										<?php } ?>
									</div>
								</div>
								<div class="clear tabber_footer"></div>
								<?php if(cmsCountModules('tabber_ban')) { ?>
									<div id="tabber_banner">
										<?php cmsModule('tabber_ban'); ?>
									</div>
									<div class="clear tabber_footer"></div>
								<?php } ?>
							<?php } ?>
							
						<!--end Tabber -->
						
						
						<!--Content-->
							<div id="content_box">
								<div id="content_bg">
									<div id="content_c">
										<div id="content_c_wrap">
											<?php if(($col['user_menu']==1) and ($inUser->id)){ ?>
												<div id="user_menu">
													<?php cmsModule('user_menu'); ?>
												</div>
											<?php } ?>
											<?php if(cmsCountModules('maintop')) { ?>
												<div class="line"><?php cmsModule('maintop'); ?></div>
											<?php } ?>
											<div class="line">
												<div id="content_wrap">
													<?php $messages = cmsCore::getSessionMessages(); ?>
													<?php if ($messages) { ?>
														<div class="sess_messages">
														<?php foreach($messages as $message){ ?>
															<?php echo $message; ?>
														<?php } ?>
														<hr>
														</div>
													<?php } ?>	
													<?php cmsBody(); ?>
												</div>
											</div>
											<?php if(cmsCountModules('mainbottom')) { ?>
												<div class="line"><?php cmsModule('mainbottom'); ?></div>
											<?php } ?>
										</div>
									</div>
								</div>

								<?php if(cmsCountModules('banner3')) { ?>
									<div id="banner3">
										<?php cmsModule('banner3'); ?>
									</div>
								<?php } ?>
							</div>	
								
						<!--end Content-->
						
						</div>
					</div>
					
					<!--end main left column-->
					
					<!--left column-->
					
					<?php if ($col['left_col']) { ?>
						<div id="left_column">
							<div id="content_l_box"><?php cmsModule('left'); ?></div>
						</div>
					<?php } ?>
					
					<!--end left column-->
					
					<div class="clear"></div>
					<?php if(cmsCountModules('bottom')) { ?>
						<div id="bottom">
							<?php cmsModule('bottom'); ?>
						</div>
					<?php } ?>
					
				</div>	
				
			<!--end main columns-->
			
			</div>
			
			<!--Footer-->
			
			<div id="footer_box">
				<div id="footer">
					<?php if(cmsCountModules('foo_menu')) { ?>
						<div id="foo_menu">
							<?php cmsModule('foo_menu'); ?>
						</div>
					<?php } ?>
					<div id="footer_copyright">
						<div id="copyright">Копирование материалов и статей с сайта <?php cmsPrintSitename(); ?> возможно только при размещении обратной активной ссылки на источник. <br>
							<?php cmsPrintSitename(); ?> &copy; <?php echo date('Y'); ?></div>
					</div>
					<div id="counter">Место для счетчиков</div>				
					<div id="foo_links" <?php if($templ['powered']==0){	?> style="display: none;" <?php } ?>>
						<div id="Dezerit_Web_Group">Дизайн сайта от <a href="http://mashkovskii.ru">Машковского Э.А.</a></div>
						<div id="InstantCMS">Работает на <a href="http://instantcms.ru/" title="Работает на InstantCMS">InstantCMS</a></div>
					</div>
				</div>
			</div>
				
			<!--end Footer-->
			
		</div>
	</div>
	<noindex>
		<div id="ie6warning" style="display: none;">
					<div id="sitename"><?php cmsPrintSitename(); ?></div>
					<div id="title">Внимание Ваш браузер устарел!</div>
					<p class="warning">
						Мы рады приветствовать Вас на нашем сайте! К сожалению браузер, которым вы пользуетесь устарел. Он не может корректно отобразить информацию на страницах нашего сайта и очень сильно ограничивает Вас в получении полного удовлетворения от работы в интернете. Мы настоятельно рекомендуем вам обновить Ваш браузер до последней версии, или установить отличный от него продукт.
						<br/><br/>
						Для того чтобы обновить Ваш браузер до последней версии, перейдите по данной ссылке
						<a rel="nofollow" id="msie" href="http://www.microsoft.com/windows/internet-explorer" title="Microsoft Internet Explorer">Microsoft Internet Explorer</a>.
						<br/>
						Если по каким-либо причинам вы не можете обновить Ваш браузер, попробуйте в работе один из этих:
						<div class="line" id="browsers">
							<a rel="nofollow" id="firefox" href="http://getfirefox.com/" title="Mozilla Firefox">Mozilla Firefox</a>
							<a rel="nofollow" id="opera" href="http://www.opera.com/download/" title="Opera">Opera</a>
							<a rel="nofollow" id="chrome" href="http://www.google.com/chrome" title="Google Chrome">Google Chrome</a>
							<a rel="nofollow" id="safari" href="http://www.apple.com/safari/download/" title="Apple Safari">Apple Safari</a>
						</div>
						<div id="preim">Какие преимущества от перехода на более новый браузер? </div>
						<ul id="warning">
							<li>
								Скорость работы. Веб-сайты загружаются быстрее;
							</li>
							<li>
								Веб-страницы отображаются корректно, что снижает риск пропуска важной информации;
							</li>
							<li>
								Больше удобств в работе с браузером;
							</li>
							<li>
								Улучшена безопасность работы в интернете.
							</li>
						<ul>
					</p>
		</div>
	</noindex>
</body>

</html>