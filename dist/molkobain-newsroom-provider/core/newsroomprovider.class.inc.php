<?php
/**
 * Copyright (c) 2015 - 2019 Molkobain.
 *
 * This file is part of licensed extension.
 *
 * Use of this extension is bound by the license you purchased. A license grants you a non-exclusive and non-transferable right to use and incorporate the item in your personal or commercial projects. There are several licenses available (see https://www.molkobain.com/usage-licenses/ for more informations)
 */

namespace Molkobain\iTop\Extension\NewsroomProvider\Core;

use Molkobain\iTop\Extension\NewsroomProvider\Common\Helper\ConfigHelper;
use NewsroomProviderBase;
use User;
use UserRights;

/**
 * Class MolkobainNewsroomProvider
 *
 * Note: This is greatly inspired by the itop-hub-connector module.
 *
 * @package Molkobain\iTop\Extension\NewsroomProvider\Core
 * @since v1.0.0
 */
class MolkobainNewsroomProvider extends NewsroomProviderBase
{
	/**
	 * @inheritDoc
	 */
	public function GetTTL()
	{
		// Update every hour
		return 60 * 60;
	}

	/**
	 * @inheritDoc
	 */
	public function IsApplicable(User $oUser = null)
	{
		if(!ConfigHelper::IsEnabled())
		{
			return false;
		}
		elseif($oUser !== null)
		{
			return UserRights::IsAdministrator($oUser);
		}
		else
		{
			return false;
		}

	}

	/**
	 * @inheritDoc
	 */
	public function GetLabel()
	{
		return 'Molkobain I/O';
	}

	public function GetMarkAllAsReadURL()
	{
		return ConfigHelper::GetMarkAllAsReadUrl();
	}

	/**
	 * @inheritDoc
	 */
	public function GetFetchURL()
	{
		return ConfigHelper::GetFetchUrl();
	}

	/**
	 * @inheritDoc
	 */
	public function GetViewAllURL()
	{
		return ConfigHelper::GetViewAllUrl();
	}

	/**
	 * @inheritDoc
	 */
	public function GetPlaceholders()
	{
		return array();
	}

	/**
	 * @inheritDoc
	 */
	public function GetPreferencesUrl()
	{
		return null;
	}
}
