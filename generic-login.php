<? 
$nologin = 1;
$choosing = 1;
require_once "hsdmgdb/connect{$mybychart}.php";
require_once "functions{$mybychart}.php";


if( $login )
{

//    mysql> create table proxylogins ( id integer primary key auto_increment, userid integer, email varchar( 255 ), type varchar( 255 ) ); 
    $ins = db_query_first_cell( "select * from proxylogins where email = '" . escMe( $email ) . "' and type = 'student' and userid = '{$user[user_id]}'" );
    
    if( !$ins )
    {
        $ins = db_query_insert_id( "insert into proxylogins ( userid, email, type, dateadded ) values ( '{$user[user_id]}', '" . escMe( $email ) . "', 'generic', now() )" );
    }
    setcookie( "proxyloginid", "$ins", time() + 90000000, "/", ".chartcipher.com" );
    setcookie( "proxylogintype", "generic", time() + 90000000, "/", ".chartcipher.com" );
    Header( "Location: index.php" );
}

?>
<?php include 'academic/header-login.php';?>
	<style>
	a {
		color: #ff6633;
	}
	.remember {
	    font-size: 12px;
	    line-height: 16px;
	    color: #7a7a7a;
	    padding-bottom: 1em;
	    margin-top: -3px;
	}
	.not-registered {
	    margin: 0 auto;
	    text-align: center;
	    color: #333333;
	    font-size: 12px;
	    line-height: 42px;
	}
	.i-agree {
		font-size: 12px;
	    line-height: 14px;
	    padding: 1em 0 2em;
	}
	#agree {
	    display: inline-block;
	    margin-right: 1em;
	}
	#login-btn {
		width: 134px;
	}
		
	</style>
	<div class="site-body site-faculty-body">
		<section class="faculty-section padding-tb">
			<div class="element-container row">
				<div class="faculty-container">
					<div class="faculty-login">
						<div class="faculty-login-header">
							<h2>Member Login</h2>
						</div><!-- ./faculty-login-header -->
						<div class="faculty-login-body">
							<form method='post'  class='search-form'>

								<p>Please enter your email address and agree to the terms and conditions to access the Immersion database.</p>

								<div class="form-row-full">
									<label>E-Mail Address</label>
									<input type="text" name='email' placeholder="E-Mail Address" />
								</div><!-- /.form-row-full -->

								<span style="color:#ff6633;">*</span>Terms and Conditions

								<div class="i-agree">
									<input type="checkbox" name="agree" value="true" id="agree">
									I agree to the Chart Cipher <a href="https://reports.chartcipher.com/terms" >terms and conditions.</a>
								</div>

								<div class="form-row-full">
									<input type="submit" name='login' value="Login" id="login-btn" />
								</div>
								<div class="cf"></div>
							</form>	

						</div><!-- ./faculty-login-body -->
					</div><!-- /.faculty-login -->

				</div><!-- /.faculty-login-container -->
			</div><!-- /.element-container -->
		</section>
 	</div><!-- /.site-body -->
    <script>
	jQuery(document).ready(function($){
	
	$.validator.setDefaults({
		errorElement: 'div',
		
	});
	
	$('.search-form').validate({
		
		rules: {
              'email': { required: true },
			'agree': { required: true }
		}
		});
	});
	
	</script>
<?php include 'footer.php';?> 	