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
$dynamic_map            = $params->get('dynamic_map_url');
$dynamic_map_zoom       = $params->get('dynamic_map_zoom');
$static_map_place       = preg_replace(" ", "+", $params->get('static_map_place'));
$static_map_zoom        = $params->get('static_map_zoom');
$static_map_width        = $params->get('static_map_width');
$static_map_height        = $params->get('static_map_height');
$googleMapsStaticApiKey = $params->get('google_maps_static_api_key');
?>

<span class="mod_google_maps_wait_to_load--span"><?php echo JText::sprintf('MOD_GOOGLE_MAP_CLICK_MAP_TO_ACTIVATE'); ?></span>
<div class="<?php echo $moduleName ?>" id="mod_google_maps_wait_to_load_container" data-iframe-width="600" data-iframe-height="300" data-iframe-src="<?php echo $dynamic_map . '&z=' . $dynamic_map_zoom; ?>">
    <a href="#mod_google_maps_wait_to_load_link" title="Click to activate map"><img src="https://maps.googleapis.com/maps/api/staticmap?center=<?php echo $static_map_place; ?>&zoom=<?php echo $static_map_zoom; ?>&scale=1&size=<?php echo $static_map_width; ?>x<?php echo $static_map_height; ?>&maptype=roadmap&format=jpg&visual_refresh=true&key=<?php echo $googleMapsStaticApiKey; ?>" alt="Click to activate map"></a>
</div>