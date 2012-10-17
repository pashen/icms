<div class="mod_userfiles_list">
	<div class="mod_userfiles_tab_swicher">
		<span class="mod_userfiles_tab_swicher">
			<a class="active" title="Новые файлы" href="#mod_userfiles_tab0" id="mod_userfiles_tab_swicher0"><p>Новые файлы</p></a>
		</span>
		<span class="mod_userfiles_tab_swicher">
			<a title="Популярные файлы" href="#mod_userfiles_tab1" id="mod_userfiles_tab_swicher1"><p>Популярные файлы</p></a>
		</span>
	</div>
	<div id="mod_userfiles_tab0" class="mod_userfiles_tab">
		{if $latest}    
			<ul class="mod_userfiles_box">
				{foreach key=id item=file from=$latest}
					<li>
						<div class="line">
							<a href="/users/files/download{$file.id}.html">{$file.filename}</a>
						</div>
						<div class="mod_userfiles_info line">
							размер: {$file.size} Мб
							<a class="mod_userfiles_user" href="{profile_url login=$file.user_login}" title="{$file.user_nickname|escape:'html'}">&nbsp;</a> 
							<a class="mod_userfiles_allfiles" href="/users/{$file.user_id}/files.html" title="Все файлы пользователя">&nbsp;</a>
						</div>
					</li>
				{/foreach}
			</ul>
		{/if}
	</div>
	<div id="mod_userfiles_tab1" class="mod_userfiles_tab">
		{if $popular}
			<ul class="mod_userfiles_box">
				{foreach key=id item=file from=$popular}
					<li>
						<div class="line">
							<a href="/users/files/download{$file.id}.html">{$file.filename}</a>
						</div>
						<div class="mod_userfiles_info line">
							Размер: {$file.size} Мб
							<a class="mod_userfiles_user" href="{profile_url login=$file.user_login}" title="{$file.user_nickname|escape:'html'}">&nbsp;</a> 
							<a class="mod_userfiles_allfiles" href="/users/{$file.user_id}/files.html" title="Все файлы пользователя">&nbsp;</a>
						</div>
					</li>
				{/foreach}
			</ul>
		{/if}
	</div>
</div>
{if $cfg.sw_stats}
    <div>Всего файлов: {$stats.total_files}</div>
    <div>Общий размер: {$stats.total_size} Мб</div>
{/if}