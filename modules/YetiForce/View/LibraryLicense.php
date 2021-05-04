<?php

/**
 * Library license view file.
 *
 * @copyright YetiForce Sp. z o.o
 * @license   YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 * @author    Arkadiusz Sołek <a.solek@yetiforce.com>
 */

namespace YF\Modules\YetiForce\View;

/**
 * Library license view class.
 */
class LibraryLicense extends \App\Controller\Modal
{
	/** {@inheritdoc} */
	public function checkPermission(): bool
	{
		return true;
	}

	/**  {@inheritdoc}  */
	public function getTitle(): string
	{
		return \App\Language::translate('LBL_LICENSE', $this->moduleName);
	}

	/** {@inheritdoc} */
	public function validateRequest(): void
	{
		$this->request->validateWriteAccess();
	}

	/** {@inheritdoc} */
	public function getModalSize(): string
	{
		return 'modal-lg';
	}

	/** {@inheritdoc} */
	public function process(): void
	{
		$fileContent = '';
		if ($this->request->isEmpty('license')) {
			$result = false;
		} else {
			$dir = ROOT_DIRECTORY . \DIRECTORY_SEPARATOR . 'licenses' . \DIRECTORY_SEPARATOR;
			$filePath = $dir . $this->request->get('license', 'Text') . '.txt';
			if (file_exists($filePath)) {
				$result = true;
				$fileContent = file_get_contents($filePath);
			} else {
				$result = false;
			}
		}

		$qualifiedModuleName = $this->request->getModule(false);
		$this->viewer->assign('QUALIFIED_MODULE', $qualifiedModuleName);
		$this->viewer->assign('FILE_EXIST', $result);
		$this->viewer->assign('FILE_CONTENT', $fileContent);
		$this->viewer->view('LibraryLicense.tpl', $qualifiedModuleName);
	}
}
