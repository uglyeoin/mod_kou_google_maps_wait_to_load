<?php
/**
 * @package    mod_google_map_wait_to_load
 *
 * @author     Eoin <your@email.com>
 * @copyright  A copyright
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       http://your.url.com
 */

defined('_JEXEC') or die;

$moduleName = $module->module;

// Ensure jQuery gets loaded before my module
JHtml::script('jui/jquery.min.js', false, true);

// Add a stylesheet
$mediaUrl = 'media/' . $moduleName;
if (file_exists($mediaUrl . '/css/' . $moduleName . '.css') && filesize($mediaUrl . '/css/' . $moduleName . '.css') > 0)
{
	$document = JFactory::getDocument();
	$document->addStyleSheet($mediaUrl . '/css/' . $moduleName . '.css', array('version' => 'auto'));
}

// Add JS
if (file_exists($mediaUrl . '/js/' . $moduleName . ".js") && filesize($mediaUrl . '/js/' . $moduleName . ".js") > 0)
{
	$document = JFactory::getDocument();
	$document->addScript($mediaUrl . '/js/' . $moduleName . ".js", "text/javascript", true, false, array('version' => 'auto'));
}


// Access to module parameters
$dynamic_map            			= $params->get('dynamic_map_url');
$dynamic_map_zoom       			= $params->get('dynamic_map_zoom');
$static_map_place       			= $params->get('static_map_place');
$static_map_zoom        			= $params->get('static_map_zoom');
$googleMapsStaticApiKey 			= $params->get('google_maps_static_api_key');
$googleMapsStaticUrlSigningSecret	= $params->get('google_maps_static_url_signing_secret');
?>

<span>Click to activate map</span>
<div class="<?php echo $moduleName ?>" id="my-fast-map" data-iframe-width="600" data-iframe-height="300" data-iframe-src="<?php echo $dynamic_map . '&z=' . $dynamic_map_zoom; ?>">
    <a href="#g-footer" title="Click to activate map"><img src="https://maps.googleapis.com/maps/api/staticmap?center=<?php echo $static_map_place; ?>&zoom=<?php echo $static_map_zoom; ?>&scale=1&size=600x300&maptype=roadmap&format=png&visual_refresh=true&key=<?php echo $googleMapsStaticApiKey; ?>&signature=<?php echo $googleMapsStaticUrlSigningSecret; ?>" alt="Click to activate map"></a>
</div>