<?php echo $head; ?>
<div class="login-container">
    <div class="pure-g centered-row">
	
       <div class="pure-u-1 pure-u-md-1-2" style="padding-top: 5px;">
        <div class="l-box">
        <p> <?php
            echo CONNECT_FACEBOOK_TXT;
            ?>
        </p>
        </div>
        </div>
        <div class="pure-u-1 pure-u-md-1-2">
            <div class="l-box" style="text-align: center;">
                <p>
				<?php
				if(CONNECT_FB==1):
				?>
                   <a class="pure-button pure-button-primary login-face auth-fb-login" data-url="<?php echo $fburl; ?>" href="javascript:void(0);"   title="Conectar con Facebook"> <i class="fa fa-facebook-square button-authface" aria-hidden="true"> </i></a>                   
				<?php
				endif;
				?>   
				<?php
				if(CONNECT_IG==1):
				?>
				   <a style="background: #1c5380;" class="pure-button pure-button-primary login-face auth-ig-login" href="javascript:void(0);"  title="Conectar con Instagram" data-url="http://instagram.com/oauth/authorize/?client_id=704275f237b346a0ac9201fef10371a4&redirect_uri=http%3A%2F%2Fauth.zonawifisocial.com%2Fhandle_instagram_callback&response_type=code&scope=basic+relationships"> <i class="fa fa-instagram button-authface" aria-hidden="true"></i> </a>
				<?php
				endif;
				?>
				<?php
				if(CONNECT_WA==1):
				?>  
				  <a style="background: #46C456;" class="pure-button pure-button-primary login-face login-instagram" href="javascript:void(0);"  title="Conectar con Whatsapp"> <i class="fa fa-whatsapp button-authface" aria-hidden="true"></i> </a>
                <?php
				endif;
				?>
                                  <?php
				if(CONNECT_TW==1):
				?> 
                                  <a style="background: #794BC4;" class="pure-button pure-button-primary login-face login-twitter" href="javascript:void(0);" title="Conectar con Twitter"> <i class="fa  fa-twitter button-authface" aria-hidden="true"></i></a>
                                  <?php
				endif;
				?>
                                    <?php
				if(CONNECT_GO==1):
				?>
			          <a style="background: #EA4335;" id="login-google" class="pure-button pure-button-primary login-face login-google" href="javascript:void(0);" title="Conectar con Google"> <i class="fa  fa-google button-authface" aria-hidden="true"></i></a>
                             <?php
				endif;
				?>
                </p>
                        
            </div>
        </div>
	
    </div>
	
	<?php
	 if(CONNECT_WITH_CODE==1):
	?>
    <div class="pure-g centered-row">
        <div class="pure-u-1 pure-u-md-1-2">
            <div class="l-box">
                <p> <?php
                   echo CONNECT_CODE_TXT;
                    ?>
                </p> 
            </div>
        </div>
        <div class="pure-u-1 pure-u-md-1-2">
            <?php echo $access_code_widget ?>
        </div>
    </div>
	 <?php
	  endif;
	 ?>
</div>

<?php echo $foot; ?>
