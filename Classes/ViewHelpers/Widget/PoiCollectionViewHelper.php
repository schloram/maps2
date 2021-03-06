<?php
namespace JWeiland\Maps2\ViewHelpers\Widget;

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
use JWeiland\Maps2\Domain\Model\PoiCollection;
use JWeiland\Maps2\ViewHelpers\Widget\Controller\PoiCollectionController;
use TYPO3\CMS\Fluid\Core\Widget\AbstractWidgetViewHelper;

/**
 * Class PoiCollectionViewHelper
 *
 * @category ViewHelpers/Widget
 * @package  Maps2
 * @author   Stefan Froemken <projects@jweiland.net>
 * @license  http://www.gnu.org/licenses/gpl.html GNU General Public License
 * @link     https://github.com/jweiland-net/maps2
 */
class PoiCollectionViewHelper extends AbstractWidgetViewHelper
{
    /**
     * @var PoiCollectionController
     */
    protected $controller;

    /**
     * inject controller
     *
     * @param PoiCollectionController $controller
     * @return void
     */
    public function injectController(PoiCollectionController $controller
    ) {
        $this->controller = $controller;
    }

    /**
     * @param PoiCollection $poiCollection
     * @param \Traversable $poiCollections
     * @param array $override Override any configuration option
     * @return string
     */
    public function render(PoiCollection $poiCollection = null, $poiCollections = null, $override = array())
    {
        return $this->initiateSubRequest();
    }
}
