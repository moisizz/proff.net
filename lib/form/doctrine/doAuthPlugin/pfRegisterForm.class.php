<?php

/**
 * User form.
 *
 * @package    proff.dev
 * @subpackage form
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pfRegisterForm extends RegisterUserForm
{
  public function configure()
  {
    $this->widgetSchema->setLabels(array('username' => 'Логин',
                                         'email' => 'E-mail',
                                         'password' => 'Пароль'));

    $this->useFields(array('username', 'email', 'password'));
  }
}
