<?php
/**
 * CMF for web applications based on
 * Symfony 2, Domain Model DDD, Doctrine 2 (Doctrine Extension)
 *
 * @copyright  Copyright (c) 2011 Valery Nayda aka naydav <web@naydav.com>
 * @link  http://www.webcreator.kiev.ua
 * @license  http://www.gnu.org/licenses/gpl-3.0.html  GNU GPLv3
 */

namespace Probesys\JQueryBundle\Twig\Extension;

use Probesys\JQueryBundle\JQuery\Api as jQueryApi,
    Probesys\JQueryBundle\Twig\TokenParser\jQueryTokenParser;

/**
 * Twig Extension for jQuery support.
 *
 * @author  naydav <web@naydav.com>
 */
class jQueryExtension extends \Twig_Extension
{
    protected $jqueryApi;

    public function __construct($jqueryApi)
    {
        $this->jqueryApi = $jqueryApi;
    }

    /**
     * Returns the token parser instance to add to the existing list.
     *
     * @return array An array of Twig_TokenParser instances
     */
    public function getTokenParsers()
    {
        return array(
            // {% jquery %}
            new jQueryTokenParser(),
        );
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'jquery';
    }

    public function getApi()
    {
        return $this->jqueryApi;
    }
}
