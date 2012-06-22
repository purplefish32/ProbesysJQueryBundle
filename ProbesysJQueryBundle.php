<?php
/**
 * CMF for web applications based on
 * Symfony 2, Domain Model DDD, Doctrine 2 (Doctrine Extension)
 *
 * @copyright  Copyright (c) 2011 Valery Nayda aka naydav <web@naydav.com>
 * @link  http://www.webcreator.kiev.ua
 * @license  http://www.gnu.org/licenses/gpl-3.0.html  GNU GPLv3
 * @edited Donovan Tengblad
 */
namespace Probesys\JQueryBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * JQueryHelperBundle.
 *
 * @author  naydav <web@naydav.com>
 * @edited  Donovan Tengblad
 */
class ProbesysJQueryBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function getNamespace()
    {
        return __NAMESPACE__;
    }

    /**
     * {@inheritdoc}
     */
    public function getPath()
    {
        return strtr(__DIR__, '\\', '/');
    }
}
