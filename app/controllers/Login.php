<?php 
defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Login Controller Class
 */


class Login
{
	use Controller;

	public function index() 
	{
		/*** EXPORT THE (OBJECTS) VARIABLES ***/
		$data['errors'] = [];

		/*** LOGIN USER ***/
		$data['page_title'] = 'Login';
		if(!empty($_SESSION['user']))
		{
			redirect('admin/index');
		} else
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$user = new User();
			// Check if the input is an email or username
			$input = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
			$row = $user->first([$input => $_POST['email']]);
			
			if($row && password_verify($_POST['password'], $row->password)) {
				$user->authenticate($row);
				$data['remember'] = $_POST['remember'];
				$data['sess_email'] = $_SESSION['email'];
				if(isset($_POST['remember']))
				{
					setcookie('remember_email', $data['sess_email'], time() + 3600 * 24 * 365);
					setcookie('remember', $data['remember'], time() + 3600 * 24 * 365);
				} else 
				{
					setcookie('remember_email', "", time() - 3600);
					setcookie('remember', "", time() - 3600);
				}
				
				redirect('admin/index');
			}
			

			$data['errors']['email'] = 'Wrong email or password!';
		}

		

		/*** DISPLAY THE VIEW PAGE ***/
		$this->view('front/login',$data);
	}

	public function forgot()
	{
		$user = new User();
		$mailer = new Mailer();
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST') 
		{
			$user->forgotPwd($_POST['email']);

			$token = $user->getResetToken($_POST['email']);
			$token = $token->reset_token_hash;

			$mail = $mailer->sendMail();
		

			// Set Properties
			$mail->setFrom('<YOUR EMAIL HERE>', '<BUSINESS NAME>');   
			$mail->addAddress($_POST['email']);               
			$mail->Subject = ('PASSWORD RESET');               
			$mail->Body = <<<END
			
				Click <a href="<?= ROOT ?>/login/forgotLink/{$token}">Here</a> to reset your password.
			
			END; 

			try {
			$mail->send();
    		Util::setFlash('reset_msg_success','Message has been sent successfully, check your inbox for further instructions!');
			redirect('login/forgot');
			} catch (Exception $e) {
				Util::setFlash('reset_msg_error',"Message could not be sent. Mailer Error: {$mail->ErrorInfo}!");
				redirect('login/forgot');
			}

		}
		
		$data['page_title'] = 'Password Reset';

		/*** DISPLAY THE VIEW PAGE ***/
		$this->view('admin/users/forgot',$data);
	}

	public function forgotLink($id = NULL)
	{
		$user = new User();
		// Extract the token from the url
		$token = basename($_GET['url']);
		$token_hash = hash('sha256',$token);

		$user_token = $user->tokenInURL($token);
		
		if($user_token == NULL)
		{
			Util::setFlash('token_not_found_error','Token not found!!');
			redirect('login');
		} elseif(strtotime($user_token->reset_token_expires_at) <= time())
		{
			Util::setFlash('token_expired_error','Your password reset token has expired, you\' have to make a new request!!');
			redirect('login');
		} else 
		{
			// Extract user ID from the token's record
			$id = $user_token->id;
			// Pass $id to the view
			$data['id'] = $id;
			
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if ($user->pwd_validate($_POST)) {

					$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
					
					// Update Password
					$user->updatePwd($id, $_POST);
					Util::setFlash('password_reset_success', 'Password reset successful, you may now login!!');

					redirect('login');

				}
			}
		}
		
		$data['errors'] = $user->errors;
		$data['page_title'] = 'Login';

		/*** DISPLAY THE VIEW PAGE ***/
		$this->view('admin/users/forgot-pass',$data);
	}
}

