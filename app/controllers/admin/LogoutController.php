<?php

class LogoutController
{
    private $f3;
    public function logout()
    {
        $this->f3 = Base::instance();
        $this->f3->clear('COOKIE.user_id');
        $this->f3->clear('COOKIE.key');
        $this->f3->reroute('/?success=ອອກຈາກລະບົບແລ້ວ!');
    }
}