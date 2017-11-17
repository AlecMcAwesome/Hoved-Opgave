<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ProfileController extends Controller
{
    /**
     * @Route("/profile", name="profilepage")
     */

    public function indexAction(Response $response)
    {
        return $this->render('@FOSUser/Profile/show.html.twig');
    }
}
