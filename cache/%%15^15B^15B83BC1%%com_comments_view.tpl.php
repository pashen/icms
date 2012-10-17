<?php /* Smarty version 2.6.19, created on 2012-10-17 13:04:58
         compiled from com_comments_view.tpl */ ?>

<div class="cmm_heading">
	<?php echo $this->_tpl_vars['labels']['comments']; ?>
 (<?php echo $this->_tpl_vars['comments_count']; ?>
)
</div>

<?php if ($this->_tpl_vars['cm_message']): ?>
	<p style="color:green"><?php echo $this->_tpl_vars['cm_message']; ?>
</p>
<?php endif; ?>


    <div class="cm_ajax_list">
    <?php if ($this->_tpl_vars['cfg']['cmm_ajax']): ?>
    <script type="text/javascript">
        <?php echo '
            var anc = \'\';
            if (window.location.hash){
                var anc = window.location.hash;
            }
        '; ?>

        loadComments('<?php echo $this->_tpl_vars['target']; ?>
', <?php echo $this->_tpl_vars['target_id']; ?>
, anc);
    </script>
	<?php else: ?>
    <?php echo $this->_tpl_vars['html']; ?>

    <?php endif; ?>
    </div>

<?php if ($this->_tpl_vars['cm_error']): ?>
	<p style="color:red"><?php echo $this->_tpl_vars['cm_error']; ?>
</p>
<?php endif; ?>

<div id="addcommentlink" src="#">
	<table cellspacing="0" cellpadding="2">
		<tr>
			<td width="16"><img src="/templates/_default_/images/icons/comment.png" /></td>
			<td><a href="javascript:void(0);" id="addcommentlink" onclick="<?php echo $this->_tpl_vars['add_comment_js']; ?>
"><?php echo $this->_tpl_vars['labels']['add']; ?>
</a></td>
			<?php if ($this->_tpl_vars['cfg']['subscribe']): ?>
				<?php if ($this->_tpl_vars['is_user']): ?>
					<?php if (! $this->_tpl_vars['user_subscribed']): ?>
						<td width="16"><img src="/templates/_default_/images/icons/subscribe.png"/></td>
						<td><a href="/subscribe/<?php echo $this->_tpl_vars['target']; ?>
/<?php echo $this->_tpl_vars['target_id']; ?>
"><?php echo $this->_tpl_vars['LANG']['SUBSCRIBE_TO_NEW']; ?>
</a></td>
					<?php else: ?>
						<td width="16"><img src="/templates/_default_/images/icons/unsubscribe.png"/></td>
						<td><a href="/unsubscribe/<?php echo $this->_tpl_vars['target']; ?>
/<?php echo $this->_tpl_vars['target_id']; ?>
"><?php echo $this->_tpl_vars['LANG']['UNSUBSCRIBE']; ?>
</a></td>
					<?php endif; ?>
				<?php endif; ?>	
			<?php endif; ?>
            <?php if ($this->_tpl_vars['comments_count']): ?>
                <td width="16"><img src="/templates/_default_/images/icons/rss.png" border="0" alt="<?php echo $this->_tpl_vars['LANG']['RSS']; ?>
"/></td>
                <td><a href="/rss/comments/<?php echo $this->_tpl_vars['target']; ?>
-<?php echo $this->_tpl_vars['target_id']; ?>
/feed.rss"><?php echo $this->_tpl_vars['labels']['rss']; ?>
</a></td>
            <?php endif; ?>
		</tr>
	</table>	
</div>

<div id="cm_addentry0" style="display:block"></div>