<?php
class BaseafGuardAuthActions extends sfActions
{
	public function executeSignout($request)
	{
        $this->getUser()->signOut();

        $signoutUrl = sfConfig::get('app_sf_guard_plugin_success_signout_url', $request->getReferer());

        $this->redirect('' != $signoutUrl ? $signoutUrl : '@homepage');
	}
	public function executeSignin($request)
	{

		$user = $this->getUser();

		if ($user->isAuthenticated())
		{
			return $this->redirect('@homepage');
		}

		if ($request->isMethod('post'))
		{
			if($request->hasParameter('signin'))
			{
				$signin=$request->getParameter('signin');
                $afUserQuery = ProjectConfiguration::getActive()->getAppFlowerUserQuery();
				$user = $afUserQuery->findOneByUsername($signin['username']);

				// user exists?
				if ($user)
				{
					// password is ok?
					//Now the user is valid
					if ($user->checkPassword($signin['password']))
					{
						//success

						$this->getUser()->signin($user, array_key_exists('remember', $signin) ? (($signin['remember']=='on')?true:false) : false);

						/**
						 * redirect to the referer page, or to @homepage, if no referer
						 *
						 * @author radu
						 */
						$signinUrl=$this->getRequest()->getReferer();
						$signinUrl=($signinUrl!=null)?$signinUrl:url_for('@homepage');

						$result = array('success' => true/*,'message'=>'You have logged in succesfuly ! You\'ll be redirected now...'*/,'redirect'=>$signinUrl,'load'=>'page');
						$result = json_encode($result);
						return $this->renderText($result);
					}
					else
					{
						$result = array('success' => false,'message'=>'The username and/or password is invalid. ! Please try again !');
						$result = json_encode($result);
						return $this->renderText($result);
					}
				}
				else
				{
					$result = array('success' => false,'message'=>'The username and/or password is invalid. ! Please try again !','redirect'=>'/login','load'=>'page');
					$result = json_encode($result);
					return $this->renderText($result);
				}
			}
			else {
				if($request->hasParameter('limit')&&$request->hasParameter('start'))
				{
					$result['success']=true;
					$result['totalCount']=1;
					$result['rows'][]=array('message'=>'You were logged out ! You\'ll be redirected to the login page!','redirect'=>'/login','load'=>'page');
				}
				else {
					$result = array('success' => false,'message'=>'You were logged out ! You\'ll be redirected to the login page!','redirect'=>'/login','load'=>'page');
				}
				$result = json_encode($result);
				return $this->renderText($result);
			}
		}
		else
		{
			// if we have been forwarded, then the referer is the current URL
			// if not, this is the referer of the current request
			$user->setReferer($this->getContext()->getActionStack()->getSize() > 1 ? $request->getUri() : $request->getReferer());

			$module = sfConfig::get('sf_login_module');
			if ($this->getModuleName() != $module)
			{
				$result = array('success' => false,'message'=>'You were logged out ! You\'ll be redirected to the login page!','redirect'=>'/login','load'=>'page');
				$result = json_encode($result);
				return $this->renderText($result);
			}
		}
	}

//	/**
//	 * Execute Password Request action
//	 *
//	 */
//	public function executePasswordRequest()
//	{
//		if ($this->getRequest()->getMethod() != sfRequest::POST)
//		{
//			// display the form
//			return sfView::SUCCESS;
//		}
//
//		// handle the form submission
//		$c = new Criteria();
//		$c->add(sfGuardUserPeer::USERNAME, $this->getRequestParameter('email'));
//		$user = sfGuardUserPeer::doSelectOne($c);
//
//		// email exists?
//		if ($user)
//		{
//			//audit log
//			$user_old=clone $user;
//
//			// set new random password
//			$password = substr(md5(rand(100000, 999999)), 0, 6);
//			$user->setPassword($password);
//			$user->save(); // save new password
//
//
//                        if ($user->getUsername()) {
//                            $parameters = array(
//                                'userObj'  => $user,
//                                'password' => $password,
//                                'email'    => $user->getUsername(),
//                                'subject'  => 'seedControl password recovery',
//                                'from'     => 'Seedcontrol'
//                            );
//
//                            afAutomailer::saveMail('mail', 'sendPasswordRequest', $parameters);
//                        }
//
//
//			//audit log
//			myLogger::logUpdateObject($user_old,$user, '/sfGuardUser/editUser?id='.$user->getId(), $user->getUsername(), $user);
//
//			sfProjectConfiguration::getActive()->loadHelpers(array("Url","Tag"));
//			$result = array('success' => true,'message'=>'Your login information was sent to '.$this->getRequestParameter('email').'. <br>You should receive it shortly, so you can proceed to the '.link_to('login page', '@login').'.');
//
//		}
//		else
//		{
//			$result = array('success' => false,'message'=>'There is no user with this email address. Please try again!');
//		}
//
//		$result = json_encode($result);
//		return $this->renderText($result);
//	}

//	public function executeRemoteLogin($request) {
//		$user = $this->getUser();
//		if ($user->isAuthenticated())
//		{
//			return $this->redirect('@homepage');
//		}
//
//		$uid = $request->getParameter('uid');
//		$hash = $request->getParameter('hash');
//
//		$user = sfGuardUserPeer::retrieveByPK($uid);
//		if($user && $hash == md5($user->getUsername() . $user->getPassword() . $user->getLastLogin()) ) { //checks hash code
//			$this->getUser()->signin($user, false);
//
//			return $this->redirect('@homepage');
//		}else {
//			return $this->redirect('@login');
//		}
//	}
}