<?php

$response = new TwimlResponse;

$forward = AppletInstance::getUserGroupPickerValue('forward');
$sms = AppletInstance::getValue('sms');

$devices = array();
switch(get_class($forward))
{
	case 'VBX_User':
		foreach($forward->devices as $device)
		{
			$devices[] = $device;
		}
		$voicemail = $forward->voicemail;
		break;
	case 'VBX_Group':
		foreach($forward->users as $user)
		{
			$user = VBX_User::get($user->user_id);
			foreach($user->devices as $device)
			{
				$devices[] = $device;
			}
		}
		$voicemail = $groupVoicemail;
		break;
	default:
		break;
}

$required_params = array('SmsSid', 'From', 'To', 'Body');
$sms_found = true;
foreach($required_params as $param)
{
	if(!in_array($param, array_keys($_REQUEST)))
	{
		$sms_found = false;
	}
}

if($sms_found)
{
	$ci = &get_instance();
	OpenVBX::addSmsMessage($forward,
							$ci->input->get_post('SmsSid'),
							$ci->input->get_post('From'),
							$ci->input->get_post('To'),
							$ci->input->get_post('Body')
						);
    $response->message($sms);
}
else
{
    $response->message("We were unable to process your text message. Please try again later.");    
}

// If we have an applet lined up, then we'll fetch it
$next = AppletInstance::getDropZoneUrl('next');
// And redirect if it is defined
if(!empty($next))
	$response->addRedirect($next);

// Otherwise, we'll respond
$response->respond();