<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\UserBundle\Controller\ProfileController as BaseController;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class ProfileController extends BaseController
{
    /**
     * @Route("/profile/show", name="profilepage")
     */

    public function showAction()
    {

        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        $em = $this->getDoctrine()->getManager();
        $userICOE = $em->getRepository('AppBundle:EmergencyEntity')
            ->findOneBy(['user' => $user->getId()])
            ;
        if(!$userICOE) {
            $this->createNotFoundException('No ICOE data found :( code: 404');
        }

        $diaries = $em->getRepository('AppBundle:DiaryEntity')
            ->findBy(['userId' => $user->getId()]);

        return $this->render('@FOSUser/Profile/show.html.twig', array(
            'icoe' => $userICOE,
            'user' => $user,
            'diaries' => $diaries
        ));
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
