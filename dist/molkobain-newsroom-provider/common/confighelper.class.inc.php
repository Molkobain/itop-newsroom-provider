<?php
/**
 * Copyright (c) 2015 - 2019 Molkobain.
 *
 * This file is part of licensed extension.
 *
 * Use of this extension is bound by the license you purchased. A license grants you a non-exclusive and non-transferable right to use and incorporate the item in your personal or commercial projects. There are several licenses available (see https://www.molkobain.com/usage-licenses/ for more informations)
 */

namespace Molkobain\iTop\Extension\NewsroomProvider\Common\Helper;

use Molkobain\iTop\Extension\HandyFramework\Common\Helper\ConfigHelper as BaseConfigHelper;
use UserRights;

/**
 * Class ConfigHelper
 *
 * @package Molkobain\iTop\Extension\NewsroomProvider\Common\Helper
 * @since v1.0.0
 */
class ConfigHelper extends BaseConfigHelper
{
	const MODULE_NAME = 'molkobain-datacenter-view';
	const SETTING_CONST_FQCN = 'Molkobain\\iTop\\Extension\\NewsroomProvider\\Common\\Helper\\ConfigHelper';

	// Note: Mind to update defaults values in the module file when changing those default values.
	const DEFAULT_SETTING_DEBUG = false;
	const DEFAULT_SETTING_ENDPOINT = 'https://www.molkobain.com/support/pages/exec.php?exec_module=molkobain-newsroom-handler&exec_page=index.php';

	/**
	 * Returns true if the debug option is enabled
	 *
	 * @return boolean
	 */
	public static function IsDebugEnabled()
	{
		return static::GetSetting('debug');
	}

	/**
	 * @return string
	 * @todo
	 */
	public static function GetMarkAllAsReadUrl()
	{
		return static::MakeUrl('mark_all_as_read');
	}

	/**
	 * @return string
	 * @todo
	 */
	public static function GetFetchUrl()
	{
		return static::MakeUrl('fetch');
	}

	/**
	 * @return string
	 * @todo
	 */
	public static function GetViewAllUrl()
	{
		return  static::MakeUrl('view_all');
	}

	/**
	 * Returns an URL to the news editor for the $sOperation and current user
	 *
	 * Note: User ID and iTop UUID are send as a non-reversible hash to ensure user's privacy
	 *
	 * @param string $sOperation
	 *
	 * @return string
	 */
	private static function MakeUrl($sOperation)
	{
		$sITopUUID = (string) trim(@file_get_contents(APPROOT . 'data/instance.txt'), "{} \n");
		$sUserId = UserRights::GetUserId();

		// Prepare a unique hash to identify users across all iTop in order to be able for them to tell whiwh news they have already read.
		// Note: We don't retrieve DB UUID for now as it is not of any use.
		$sUserHash = hash('fnv1a64', $sITopUUID.'-'.$sUserId);

		return static::GetSetting('endpoint')
			. '&operation=' . $sOperation
			. '&user=' . urlencode($sUserHash);
	}
}
