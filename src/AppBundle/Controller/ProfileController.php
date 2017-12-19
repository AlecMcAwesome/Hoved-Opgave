<?php

namespace AppBundle\Controller;

use AppBundle\Entity\IntroToExerciseEntity;
use AppBundle\Entity\PTSDSurveyEntity;
use AppBundle\Form\PTSDTestForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\UserBundle\Controller\ProfileController as BaseController;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Component\HttpFoundation\Request;
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
            ->findOneBy(['user' => $user->getId()]);
        if (!$userICOE) {
            $this->createNotFoundException('No ICOE data found :( code: 404');
        }
        $diaries = $em->getRepository('AppBundle:DiaryEntity')
            ->findBy(['userId' => $user->getId()]);
        $exercises = $em->getRepository('AppBundle:IntroToExerciseEntity');
        $tests = $em->getRepository('AppBundle:PTSDSurveyEntity')
            ->findBy(['user' => $user->getId()]);
        return $this->render('@FOSUser/Profile/show.html.twig', array(
            'icoe' => $userICOE,
            'user' => $user,
            'diaries' => $diaries,
            'exercises' => $exercises,
            'tests' => $tests
        ));
    }

    /**
     * @Route("/profile/edit", name ="editprofile")
     */
    public function editProfile()
    {
        return $this->render('@FOSUser/Profile/edit_content.html.twig');
    }

    /**
     * @Route("/profile/change-password", name="changePassword")
     */
    public function changePassword()
    {
        return $this->render('@FOSUser/ChangePassword/change_password_content.html.twig');
    }

    /**
     * @Route("/profile/tests/", name ="ptsdtest")
     */
    public function ptsdTestAction(Request $request)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();

        $survey = new PTSDSurveyEntity();
        $form = $this->createForm(PTSDTestForm::class, $survey);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $survey->setUser($user);
            $survey->setResult($survey->getQuestion1() + $survey->getQuestion2() + $survey->getQuestion3() + $survey->getQuestion4());
            $em->persist($survey);
            $em->flush();
            return $this->redirectToRoute('testresult');
        }

        return $this->render('default/PTSDTest.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/profile/{id}/diary/{darId}", name="readDiary")
     */
    public function readDiary($id, $darId){

        $em = $this->getDoctrine()->getManager();

        $diary = $em->getRepository('AppBundle:DiaryEntity')
            ->findOneBy(['id' => $darId, 'userId' => $id]);



        return $this->render('default/ReadDiary.html.twig', array(
            'diary' => $diary
        ));
    }

    /**
     * @Route("/profile/test/result", name="testresult")
     */
    public function showresultAction()
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $test = $em->getRepository('AppBundle:PTSDSurveyEntity')
            ->findOneBy(['user' => $user], ['id' => 'DESC']);

        if ($test->getResult() <= 5) {
            $exercises = $em->getRepository('AppBundle:IntroToExerciseEntity')
                ->findOneBy(['title' => 'Meditation Exercises']);

            return $this->render('default/PTSDResult.html.twig', array(
                'result' => $test,
                'exercise' =>$exercises
            ));
        } elseif ($test->getResult() > 5 && $test->getResult() <= 10){
            $exercise = $em->getRepository('AppBundle:IntroToExerciseEntity')
                ->findOneBy(['title' => 'Visual Relaxation']);
            return $this->render('default/PTSDResult.html.twig', array(
                'result' => $test,
                'exercise' => $exercise
            ));
        }elseif($test->getResult() < 10 && $test->getResult() <= 15){
            $exercise = $em->getRepository('AppBundle:IntroToExerciseEntity')
                ->findOneBy(['title' => 'Sounds Of Nature']);
            return $this->render('default/PTSDResult.html.twig', array(
                'result' => $test,
                'exercise' => $exercise
            ));
        }else{
            $exercise = $em->getRepository('AppBundle:IntroToExerciseEntity')
                ->findOneBy(['title' => 'Breathing Exercises']);
            return $this->render('default/PTSDResult.html.twig', array(
                'result' => $test,
                'exercise' => $exercise
            ));
        }
    }

    /**
     * @Route("profile/exercise/toggle/remove/{userId}/{exId}", name="profiletoggleofffavorite")
     */
    public function removeFavorite($userId, $exId)
    {
        $em = $this->getDoctrine()->getManager();

        $exercise = $em->getRepository('AppBundle:IntroToExerciseEntity')
            ->findOneBy(['id' => $exId]);

        $user = $em->getRepository('AppBundle:User')
            ->findOneBy(['id' => $userId]);

        $exercise->removeUserFavorite($user);
        $em->persist($exercise);
        $em->flush();
        return $this->redirectToRoute('profilepage');
    }
}
