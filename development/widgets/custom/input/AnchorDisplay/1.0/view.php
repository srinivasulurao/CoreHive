<?php if($this->data['agentstatus']) { ?>
<div id="rn_espanol">
	<?php if($this->data['interfaceid']==1) { ?>
		<?php if($this->data['a_id']) { ?>
		<a href="https://oncorcms-es.custhelp.com/app/answers/detail_chat/tmpl/postans/a_id/<?php echo $this->data['a_id']; ?>/p_li/<?php echo $this->data['url_str']; ?>">Español</a>
		<?php } else {?>
		<a href="https://oncorcms-es.custhelp.com/app/chat/new_chat_launch/p_li/<?php echo $this->data['url_str']; ?>">Español</a>
		<?php } ?>
	<?php } else { ?>
		<?php if($this->data['a_id']) { ?>
		<a href="https://oncorcms--upgrade.custhelp.com/app/answers/detail_chat/tmpl/postans/a_id/<?php echo $this->data['a_id']; ?>/p_li/<?php echo $this->data['url_str']; ?>">English</a>
		<?php } else {?>
		<a href="https://oncorcms--upgrade.custhelp.com/app/chat/new_chat_launch/p_li/<?php echo $this->data['url_str']; ?>">English</a>
		<?php } ?>
	<?php } ?>
	
	


</div>
<?php } ?>