<?php
namespace JWeiland\Maps2\ViewHelpers\Form;

/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Class RenderHiddenFieldsForGetViewHelper
 *
 * @category ViewHelpers/Form
 * @package  Maps2
 * @author   Stefan Froemken <projects@jweiland.net>
 * @license  http://www.gnu.org/licenses/gpl.html GNU General Public License
 * @link     https://github.com/jweiland-net/maps2
 */
class RenderHiddenFieldsForGetViewHelper extends AbstractViewHelper
{

    /**
     * @var \TYPO3\CMS\Extbase\Service\ExtensionService
     */
    protected $extensionService;

    /**
     * @var \TYPO3\CMS\Frontend\Page\CacheHashCalculator
     */
    protected $cacheHashCalculator;

    /**
     * inject extensionService
     *
     * @param \TYPO3\CMS\Extbase\Service\ExtensionService $extensionService
     * @return void
     */
    public function injectExtensionService(\TYPO3\CMS\Extbase\Service\ExtensionService $extensionService)
    {
        $this->extensionService = $extensionService;
    }

    /**
     * inject cacheHashCalculator
     *
     * @param \TYPO3\CMS\Frontend\Page\CacheHashCalculator $cacheHashCalculator
     * @return void
     */
    public function injectCacheHashCalculator(\TYPO3\CMS\Frontend\Page\CacheHashCalculator $cacheHashCalculator)
    {
        $this->cacheHashCalculator = $cacheHashCalculator;
    }

    /**
     * implements a vievHelper to trim explode comma separated strings
     *
     * @param int $pageUid UID of target page
     * @param string $action Target action
     * @param string $controller Target controller. If null current controllerName is used
     * @return array
     */
    public function render($pageUid = 0, $action = null, $controller = null)
    {
        $pluginNamespace = $this->extensionService->getPluginNamespace(
            $this->controllerContext->getRequest()->getControllerExtensionName(),
            $this->controllerContext->getRequest()->getPluginName()
        );
        // get pageUid
        $pageUid = $pageUid ? $pageUid : $GLOBALS['TSFE']->id;

        // create array for cHash calculation
        $parameters = array();
        $parameters['id'] = $pageUid;
        $parameters[$pluginNamespace]['controller'] = $controller;
        $parameters[$pluginNamespace]['action'] = $action;
        $cachHashArray = $this->cacheHashCalculator->getRelevantParameters(
            GeneralUtility::implodeArrayForUrl('', $parameters)
        );

        // create array of hidden fields for GET forms
        $fields = array();
        $fields[] = '<input type="hidden" name="id" value="' . $pageUid . '" />';
        $fields[] = '<input type="hidden" name="' . $pluginNamespace . '[controller]" value="' . $controller . '" />';
        $fields[] = '<input type="hidden" name="' . $pluginNamespace . '[action]" value="' . $action . '" />';

        // add cHash
        $fields[] = '<input type="hidden" name="cHash" value="' . $this->cacheHashCalculator->calculateCacheHash(
            $cachHashArray
        ) . '" />';

        return implode(chr(10), $fields);
    }
}
