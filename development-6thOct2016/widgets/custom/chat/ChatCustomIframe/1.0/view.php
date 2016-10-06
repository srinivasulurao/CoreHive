<div id="rn_<?=$this->instanceID;?>">
	<?php if(!$this->data['params']['type']) { ?>
		<? /*if($this->data['chatHours']['inWorkHours'] && $this->data['agentstatus'] && !$this->data['chatHours']['holiday']): */ ?>
		<? if($this->data['agentstatus']):  ?>
			<input type="image" id ="rn_<?=$this->instanceID;?>_anchor" value="Live Chat" name="button" src="/euf/assets/images/icons/chat_on.gif" border = "0"/>

		<? else:?>
			<img id ="rn_<?=$this->instanceID;?>_anchor" src="/euf/assets/images/icons/chat_off.gif" border = "0" />
		<? endif;?>
	
	<?php } else if($this->data['params']['type'] = 'postans') { ?>
			
			<button id ="rn_<?=$this->instanceID;?>_anchor" class="rn_button_continue" name="button"/> Continue </button>
			
	<?php } ?>
</div>
