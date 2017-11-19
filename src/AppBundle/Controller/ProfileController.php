<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
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

    /**
     * @Route("/profile/edit", name ="editprofile")
     */
    public function editProfile(){
        return $this->render('@FOSUser/Profile/edit_content.html.twig');
    }

    /**
     * @Route("/profile/change-password", name="changePassword")
     */
    public function changePassword (){
        return $this->render('@FOSUser/ChangePassword/change_password_content.html.twig');
    }
}
