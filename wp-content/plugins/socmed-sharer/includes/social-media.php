<div class="social-media-container">
    <h2> Social Media Sharer </h2>

    <?php $socmed_list  = array(
        "facebook" => "#0866FF",
        "twitter" => "#1d9bf0",
        "linkedin" => "#007BB5",
    );

    $background_setting = "";
    $active_socmed_list = "";

    if (!empty(get_option('socmed_sharer'))) :
        $socmed_sharer = unserialize(get_option('socmed_sharer'));
        $background_setting = $socmed_sharer['background-setting'];
        $active_socmed_list = $socmed_sharer['social-media'];
    endif;
    
    if (isset(($_POST)) && !empty(($_POST))) :
        if (update_option('socmed_sharer', serialize($_POST))) :
            $active_socmed_list = $_POST['social-media'];
            $background_setting = $_POST['background-setting']; ?>
            <div class="updated">
                <p><?php _e('Saved succesfully.', 'socmed-media-sharer'); ?></p>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>


<div class="social-media-container">
    <div class="sm-form">
        <form method="POST">
            <table>
                <tbody>

                    <tr>
                        <th>Setting</th>
                        <td>
                            <select name="background-setting">
                                <option value="no-bg" <?= (empty($background_setting) || $background_setting == 'no-bg') ? 'selected' : '' ?>>No Background</option>
                                <option value="with-bg" <?= (!empty($background_setting) && $background_setting == 'with-bg') ? 'selected' : '' ?>>With Background</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Active Buttons</th>
                        <td>
                            <?php if (!empty($active_socmed_list)) : ?>
                                <ul class="social-media-list">
                                    <?php foreach ($active_socmed_list as $value) : ?>
                                        <li>
                                            <label>
                                                <img style="background-color:<?= $socmed_list[$value] ?>" src="<?= WP_PLUGIN_URL; ?>/socmed-sharer/assets/images/icons/<?= $value ?>.svg" width="24" height="24" alt="<?= $value ?>">
                                            </label>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </td>
                    </tr>

                    <tr>
                        <th>Select Share Buttons</th>
                        <td>
                            <ul class="social-media-list">
                                <?php foreach ($socmed_list as $key => $value) : ?>
                                    <li class="cursor-pointer">
                                        <input type="checkbox" name="social-media[]" value="<?= $key ?>" id="<?= $key ?>" <?= (!empty( $active_socmed_list ) && in_array($key, $active_socmed_list)) ? 'checked' : ''; ?>>
                                        <label for="<?= $key ?>">
                                            <img style="background-color:<?= $value ?>" src="<?= WP_PLUGIN_URL; ?>/socmed-sharer/assets/images/icons/<?= $key ?>.svg" width="24" height="24" alt="<?= $key ?>">
                                        </label>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <button>Save</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
    
    <h2> How to use </h2>
    <code><b>Shortcode:</b> [socmed_sharer] </code>
</div>