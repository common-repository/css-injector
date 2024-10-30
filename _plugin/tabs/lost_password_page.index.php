<?php
/**
 * lost_password_page.index.php
 * 
 * @file ./_plugin/tabs/lost_password_page.index.php
 * @package 77solutions.CSSInjector
 * @author 77 Solutions, Matthew Lukas Mania
 * @license GPLv3
 * @license https://www.gnu.org/licenses/gpl-3.0.txt
 */
/*
This file is part of Custom CSS Injector.

Custom CSS Injector is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or any later version.

Custom CSS Injector is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Custom CSS Injector. If not, see https://www.gnu.org/licenses/gpl-3.0.txt.
*/


// Security fallback
if((!$_core -> Call('Permissions', 'IsSuperAdmin', array())) && (!$_core -> Call('Permissions', 'IsAdmin', array()))){ echo 'No access.'; exit; }


if(isset($_POST['submit'])){
	
	$nonce_id = $_plugin -> GetID().'-nonce';
	
	if(isset($_POST[$nonce_id])){
		
		if(!$_core -> Call('Nonces', 'Verify', array($_POST[$nonce_id], $active_tab_id))){
			
			$_core -> Call('Redirects', 'NoticeRefresh', array('error', 'Nonce expired and this page was refreshed. Please try to send form again.'));
		}
	}
	else{
		
		$_core -> Call('Redirects', 'NoticeRefresh', array('error', 'Security Error. Nonce key was not received. Please try again.'));
	}
	
	
	$_plugin -> OptionUpdate('recovery_css_head_enabled', ((isset($_POST['recovery_css_head_enabled'])) && ($_POST['recovery_css_head_enabled'])));
	
	if(isset($_POST['recovery_css_head_code'])){
		
		$head_code = $_core -> Call('Formatting', 'StripAllTags', array($_POST['recovery_css_head_code']));
		$head_code_safe = $_core -> Call('Formatting', 'SanitizeCSS', array($head_code));
		
		$_plugin -> OptionUpdate('recovery_css_head_code', $head_code);
		$_plugin -> OptionUpdate('recovery_css_head_code_safe', $head_code_safe);
	}
	
	$_plugin -> OptionUpdate('recovery_css_foot_enabled', ((isset($_POST['recovery_css_foot_enabled'])) && ($_POST['recovery_css_foot_enabled'])));
	
	if(isset($_POST['recovery_css_foot_code'])){
		
		$foot_code = $_core -> Call('Formatting', 'StripAllTags', array($_POST['recovery_css_foot_code']));
		$foot_code_safe = $_core -> Call('Formatting', 'SanitizeCSS', array($foot_code));
		
		$_plugin -> OptionUpdate('recovery_css_foot_code', $foot_code);
		$_plugin -> OptionUpdate('recovery_css_foot_code_safe', $foot_code_safe);
	}
	
	$_core -> Call('Redirects', 'NoticeRefresh', array('success', 'Success.'));
}
?>

<?php $_core -> Call('UI', 'PluginPageH2', array('Lost Password CSS', 'undo')); ?>

<form action="" method="POST">
	
	<table class="form-table">
		
		<tbody>
			
			<tr valign="top">
				
				<th scope="row"><label for="control_recovery_css_head_enabled">
					
					<span class="xs-hidden">Head</span>
					<span class="xs-visible">Head CSS</span>
				</label></th>
				<td>
					
					<fieldset>
						
						<label><input type="checkbox" id="control_recovery_css_head_enabled" name="recovery_css_head_enabled"<?php if(isset($_POST['submit'])){ if(isset($_POST['recovery_css_head_enabled'])){ if($_POST['recovery_css_head_enabled']){ echo ' checked'; } } }else{ if($_plugin -> OptionGet('recovery_css_head_enabled')){ echo ' checked'; } } ?> data-77-scroll-target="div_recovery_css_head">&nbsp; Enable</label>
						
						
						<div id="div_recovery_css_head"<?php if(!$_plugin -> OptionGet('recovery_css_head_enabled')){ echo ' style="display: none;"'; } ?>>
							
							<br>
							<textarea type="text" id="control_recovery_css_head_code" name="recovery_css_head_code" rows="5" cols="50" autocapitalize="off" spellcheck="false" class="large-text code textarea-auto-height" placeholder="Paste or write CSS code here."><?php if(isset($_POST['recovery_css_head_code'])){ echo stripslashes($_POST['recovery_css_head_code']); }else{ if($_plugin -> OptionGet('recovery_css_head_code')){ echo stripslashes($_plugin -> OptionGet('recovery_css_head_code')); } } ?></textarea>
							<p class="description">Please be careful. Code will be updated immediately after You save changes.</p>
						</div>
					</fieldset>
				</td>
			</tr>
			<tr valign="top">
				
				<th scope="row"><label for="control_recovery_css_foot_enabled">
					
					<span class="xs-hidden">Footer</span>
					<span class="xs-visible">Footer CSS</span>
				</label></th>
				<td>
					
					<fieldset>
						
						<label><input type="checkbox" id="control_recovery_css_foot_enabled" name="recovery_css_foot_enabled"<?php if(isset($_POST['submit'])){ if(isset($_POST['recovery_css_foot_enabled'])){ if($_POST['recovery_css_foot_enabled']){ echo ' checked'; } } }else{ if($_plugin -> OptionGet('recovery_css_foot_enabled')){ echo ' checked'; } } ?> data-77-scroll-target="div_recovery_css_foot">&nbsp; Enable</label>
						
						<div id="div_recovery_css_foot"<?php if(!$_plugin -> OptionGet('recovery_css_foot_enabled')){ echo ' style="display: none;"'; } ?>>
							
							<br>
							<textarea type="text" id="control_recovery_css_foot_code" name="recovery_css_foot_code" rows="5" cols="50" autocapitalize="off" spellcheck="false" class="large-text code textarea-auto-height" placeholder="Paste or write CSS code here."><?php if(isset($_POST['recovery_css_foot_code'])){ echo stripslashes($_POST['recovery_css_foot_code']); }else{ if($_plugin -> OptionGet('recovery_css_foot_code')){ echo stripslashes($_plugin -> OptionGet('recovery_css_foot_code')); } } ?></textarea>
							<p class="description">Please be careful. Code will be updated immediately after You save changes.</p>
						</div>
					</fieldset>
				</td>
			</tr>
		</tbody>
	</table>
	
	<?php $_core -> Call('Nonces', 'Field', array($active_tab_id, $_plugin -> GetID().'-nonce')); ?>
	
	<?php $_core -> Call('UI', 'PluginFormButtons', array(array(
		
		'Save Changes'		=>		'submit'
	))); ?>
</form>