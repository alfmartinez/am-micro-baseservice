<?php

namespace Micro\BaseServiceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StatusRestController extends Controller
{
    public function statusAction()
    {
        return array(
            'msg' => 'OK'
        );
    }
}
