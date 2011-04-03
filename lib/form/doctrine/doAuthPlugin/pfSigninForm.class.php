<?php

class pfSigninForm extends SigninForm
{
  public function  configure() {
    $this->widgetSchema->setLabels(array('username' => 'Логин',
                                         'password' => 'Пароль',
                                         'remember' => 'Запомнить?'));
  }
}
