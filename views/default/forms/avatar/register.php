<?php
/**
 * Avatar upload form
 * 
 * @uses $vars['entity']
 */
elgg_load_js('webcam');

$tabs = array('acquire', 'upload');
$selected_tab = get_input('tab', 'acquire');

$options = array(
	'tabs' => array(),
	'class' => 'avatar-tabs'
);

foreach ($tabs as $tab) {
	$options['tabs'][] = array(
		'text' => elgg_echo("webcam:tab:$tab"),
		'id' => "avatar-$tab-tab",
		'selected' => $selected_tab == $tab,
		'href' => '#'
	);
}

$tab_nav = elgg_view('navigation/tabs', $options);

echo "<div class='mandatory'>";
echo "<br><label for='register-avatar'>";
echo elgg_echo('avatar'); 
echo "</label><br><br>";
echo $tab_nav;
echo "</div>";
?>

<div id="avatar-options">
	<div id="avatar-upload" class="hidden">
		<label><?php echo elgg_echo("avatar:upload"); ?></label><br />
		<?php echo elgg_view("input/file", array("name"=>"profile_icon", "id" => "register-profile_icon"));
 ?>
	</div>

        <div id="avatar-acquire">
                <label><?php echo elgg_echo("webcam:acquire:info"); ?></label><br />
                <div id="webcam">
                        <canvas id="webcam-canvas" class="hidden"></canvas>
                        <video id="webcam-video"></video>
                </div>
        </div>


        <div id="avatar-url" class="hidden">
                <label><?php echo elgg_echo("webcam:url:info"); ?></label><br />
                <?php echo elgg_view("input/text", array('name' => 'avatar_url')); ?>
        </div>
</div>
