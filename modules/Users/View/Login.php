<?php
/**
 * Users login view file.
 *
 * @package View
 *
 * @copyright YetiForce Sp. z o.o.
 * @license   YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 * @author    Mariusz Krzaczkowski <m.krzaczkowski@yetiforce.com>
 */

namespace YF\Modules\Users\View;

/**
 * Users login view class.
 */
class Login extends \App\Controller\View
{
	/** {@inheritdoc} */
	public function loginRequired(): bool
	{
		return false;
	}

	/** {@inheritdoc} */
	public function checkPermission(): void
	{
	}

	/** {@inheritdoc} */
	public function getPageTitle(): string
	{
		return \App\Language::translate('LBL_LOGIN_PAGE', $this->moduleName);
	}

	/** {@inheritdoc} */
	public function process()
	{
		$module = $this->request->getModule();
		$this->viewer->view('Login.tpl', $module);
	}

	/** {@inheritdoc} */
	public function postProcess(): void
	{
		$this->viewer->assign('SHOW_FOOTER_BAR', false);
		parent::postProcess();
	}
}
