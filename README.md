======================================================================
[![Gitter](https://badges.gitter.im/Join Chat.svg)](https://gitter.im/purplefish32/ProbesysJQueryBundle?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge)
ProbesysJQueryBundle: Added jQuery support to Symfony2
======================================================================

Based on the work of Nayda Valery :
https://github.com/naydav/JQueryHelperBundle

## Installation

Add this line to your composer.json file :
    "probesys/jquery-bundle": "master",

Install composer and run:
    php composer.phar update

Add this line to your AppKernel.php file:
    new Probesys\JQueryBundle\ProbesysJQueryBundle(),

#### Default config
    enable:             false

    jquery:
      version:          1.7.2
      ssl:              false
      localpath:        false

    jqueryui:
      version:          1.8.21
      ssl:              false
      localpath:        false

    noconflictmode:
      enable:                false
      noConflictModeHandler: '$j'

## Using

### Twig

    {% jquery 'render' %} for generate all javascripts with libraries
    or {% jquery 'renderOnLoad' %} for generate only javascripts without libraries (Currently untested)

    OnLoad script capture
    {% block onload %}
        {% jquery 'addOnLoad' %} onLoad javascript {% jquery 'addOnLoadEnd' %} (Currently untested)
    {% endblock %}


### Using a local copy of jQuery as fallback
Only jquery 1.7.2 for the moment, If you need other versions just ask and I will add them
    {% jquery 'render' %}
    <!-- Fallback to local copy of jQuery -->
    <script>window.jQuery || document.write('<script src="{{ asset("bundles/probesysjquery/js/jquery-1.7.2.min.js") }}"><\/script>')</script>

### Examples

Example 1:
    Config:
        // app/config/config.yml
        probesys_j_query:
            enable:             true

          jquery:
              version:          1.5.1

          jqueryui:
              version:          1.8.11

          noconflictmode:
              enable:           true

    Generate:
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
        <script type="text/javascript">var $j = jQuery.noConflict();</script>


Example 2:
    Config:
    // app/config/config.yml
        probesys_j_query:
          enable:             true

          jquery:
              version:          1.5.1
              ssl:              true

          jqueryui:
          localpath:          'mypath/jquery.ui.v11.2.js'

          noconflictmode:
            enable:           true
            noConflictModeHandler: '$jq'

    Generate:
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="mypath/jquery.ui.v11.2.js"></script>
        <script type="text/javascript">var $jq = jQuery.noConflict();</script>

Example 3:
    // twig action template
    {% block onload %}
        {% jquery 'addOnLoad' %} $j.wcDashboard(); {% jquery 'addOnLoadEnd' %}
    {% endblock %}

    // twig layout
    {% block onload %}{% endblock %}
    {% jquery 'render' %}

    Generate:
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
        <script type="text/javascript">var $j = jQuery.noConflict();</script>
        <script type="text/javascript">
        //<![CDATA[
        $j(document).ready(function() {
             $j.wcDashboard();
        });
        //]]>
        </script>