<div class="vbx-applet">

		<h2>First, save the message to this inbox:</h2>
		<?php echo AppletUI::UserGroupPicker('forward'); ?>

		<h2>Then, send a response to the sender</h2>
        <small>Note that numbers that do not support SMS sending will not conduct this action...</small>
		<fieldset class="vbx-input-container">
			<textarea name="sms" class="medium"><?php echo AppletInstance::getValue('sms'); ?></textarea>
		</fieldset>

</div><!-- .vbx-applet -->
