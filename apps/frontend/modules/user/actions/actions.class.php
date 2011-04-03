<?php

/**
 * user actions.
 *
 * @package    proff.dev
 * @subpackage user
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userActions extends doAuthActions
{
  public function executeSignin($request) {
    $user = $this->getUser();
    if ($user->isAuthenticated()) {
      return $this->redirect('@homepage');
    }

    $this->form = new pfSigninForm();

    $this->preSignin($request);

    if ($request->isMethod('post')) {
      $this->form->bind($request->getParameter('signin'));
      if ($this->form->isValid()) {
        $values = $this->form->getValues();
        $this->getUser()->signin($values['user'], array_key_exists('remember', $values) ? $values['remember'] : false);

        $this->postSignin($request);

        // always redirect to a URL set in app.yml
        // or to the referer
        // or to the homepage
        $signinUrl = sfConfig::get('app_doAuth_signin_url', $user->getReferer($request->getReferer()));

        return $this->redirect('' != $signinUrl ? $signinUrl : '@homepage');
      }
    }
    else {

      // if we have been forwarded, then the referer is the current URL
      // if not, this is the referer of the current request
      $user->setReferer($this->getContext()->getActionStack()->getSize() > 1 ? $request->getUri() : $request->getReferer());

      $module = sfConfig::get('sf_login_module');
      if ($this->getModuleName() != $module) {
        $this->getLogger()->warning('User is accessing signin action which is currently not configured in settings.yml. Please secure this action or update configuration');
      }
    }
  }
  
  public function executeRegister(sfWebRequest $request) {

    $this->form = new pfRegisterForm();

    $this->dispatcher->notify(new sfEvent($this, 'user.pre_register'));

    $this->preRegister($request);

    if ($request->isMethod('post')) {
      $this->form->bind($request->getParameter('user'),$request->getParameter('user'));
      if ($this->form->isValid()) {
        $this->form->save();
        $user = $this->form->getObject();
        $user->setPassword($this->form->getValue('password'));
        $user->save();

        $this->user = $user;

        $this->dispatcher->notify(new sfEvent($this, 'user.registered',array('password'=> $this->form->getValue('password'))));
        $this->postRegister($request);

        if (!sfConfig::get('app_doAuth_activation',false)) {
          $user->setIsActive(1);
          $user->save();
          $this->firstSignin();
        } else {
          $this->getUser()->setFlash('notice','Для завершения регистрации перейдите по ссылке, отправленной вам на указанную вами почту');
        }

        if ($params = sfConfig::get('app_doAuth_register_forward')) {
          list($module, $action) = $params;
          $this->forward($module, $action);
        }
        $this->redirect(sfConfig::get('app_doAuth_register_redirect','@homepage'));
      }
    }
  }
}
