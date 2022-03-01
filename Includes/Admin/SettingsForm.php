<div id="kirilkirkov" class="wrap">
    <form method="post" action="options.php">
        <div class="header p-4 flex items-center space-between">
            <div class="flex items-center">
            <svg class="svg-icon mr-4" fill="#3a9715" style=" height: 40px ;vertical-align: middle;fill: currentColor:#3a9715; overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M597.333333 853.333333a85.333333 85.333333 0 0 0 85.333334-85.333333V213.333333H384a42.666667 42.666667 0 0 0-42.666667 42.666667v426.666667H213.333333V213.333333a128 128 0 0 1 128-128h469.333334a128 128 0 0 1 128 128v42.666667h-170.666667v554.666667a128 128 0 0 1-128 128H213.333333a128 128 0 0 1-128-128v-42.666667h426.666667a85.333333 85.333333 0 0 0 85.333333 85.333333z" fill="" /></svg>
                <h2>Add Scripts — <?php _e( 'Page: Settings', KIRILKIRKOV_ADD_SCRIPTS_TEXT_DOMAIN ) ?></h2>    
            </div>
            
            <button type="submit" class="button-primary"><?php _e( 'Save' ) ?></button>
        </div>
    
        <div class="flex flex-wrap">
            <div class="w-full md:w-3/4">
                <div class="section-header p-4">
                    <strong><?php _e( 'Add Scripts', KIRILKIRKOV_ADD_SCRIPTS_TEXT_DOMAIN ) ?></strong>
                    <p>
                        <?php _e('
                            This plugin integrates scripts into the header of your theme.
                            If your theme doesn’t include default header, then I’d recommend 
                            getting another theme. A well-written theme will always include 
                            this, and if it doesn’t, who’s to say where else there may be 
                            problems?
                        ', KIRILKIRKOV_ADD_SCRIPTS_TEXT_DOMAIN ) ?>
                    </p>
                </div>

                <div class="section-body">
                    <div class="p-4">
                        <table class="form-table">
                            <tr valign="top">
                                <th scope="row" class="align-middle">
                                    <div class="th-div">
                                        <span class="mr-5"><?php _e( 'Add Script', KIRILKIRKOV_ADD_SCRIPTS_TEXT_DOMAIN ); ?></span>
                                    </div>
                                </th>
                                <td colspan="2">
                                    <label><?php _e( 'Code', KIRILKIRKOV_ADD_SCRIPTS_TEXT_DOMAIN ); ?></label>
                                    <textarea placeholder="none" name="<?php echo KIRILKIRKOV_ADD_SCRIPTS_INPUTS_PREFIX; ?>scripts"><?php echo get_option( KIRILKIRKOV_ADD_SCRIPTS_INPUTS_PREFIX.'scripts' ); ?></textarea>
                                </td>
                            </tr>

                            <input type="hidden" name="action" value="update" />
                            <input type="hidden" name="page_options" value="<?php echo KIRILKIRKOV_ADD_SCRIPTS_INPUTS_GROUP; ?>" />

                            <?php settings_fields(KIRILKIRKOV_ADD_SCRIPTS_INPUTS_GROUP); ?>
                        </table>
                        <div class="flex justify-end">
                            <button type="submit" class="button-primary"><?php _e( 'Save' ) ?></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/4 ad-col">
                <div class="p-4">
                    <div class="ad-box p-4 flex flex-wrap items-center justify-between">
                        <img src="<?php echo plugins_url('GitHub-Mark-64px.png', __FILE__ ); ?>" width="30px" height="30px" alt="GitHub">
                        <a href="https://github.com/Wordpress-Plugins-World" class="accent-button" target="_blank"><?php _e( 'Find Us', KIRILKIRKOV_ADD_SCRIPTS_TEXT_DOMAIN ); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>