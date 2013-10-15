<?php

namespace Vip\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class VipUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
