
<?php echo $head; ?>
    <div class="centered-row">
        <div class="l-box">
            <h2><?php echo _('Facebook login successful!') ?></h2>
        </div>
    </div>
    <div class="pure-g centered-row">
        <div class="pure-u-1 pure-u-md-1-2">
            <div class="l-box">
                <p> <?php
                    echo _('The last step.');
                    echo ' ';
                    echo _('Share our website on Facebook to connect to our free WIFI SOCIAL service.');
                    echo ' ';
                    ?>
                </p>
            </div>
        </div>
        <div class="pure-u-1 pure-u-md-1-2">
            <div class="l-box">
                <p>
                    <form class="pure-form pure-form-stacked" action="<?php echo $post_action; ?>">
                        <input type="hidden" name="nonce" id="fb_message_nonce" value="<?php echo $nonce; ?>"/>
                      <button type="submit" class="pure-button pure-button-primary login-face">
                                <i class="fa fa-share-alt-square button-authface" aria-hidden="true"></i>
                                <?php echo _('Share  our website')?>
                      </button>
                    </form>
                </p>
            </div>
        </div>
    </div>
    <?php echo $back_to_code_widget ?>

<?php echo $foot; ?>
