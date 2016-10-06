<div id="rn_<?= $this->instanceID ?>" class="<?= $this->classList ?>">
</div>
<?php
if($this->data['printHeadCss']):
?>
<style type="text/css">
@media print { 
body { 
display:none !important; 
} 
} </style>

<?php
endif;
?>