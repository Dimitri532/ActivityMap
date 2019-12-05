<?php

namespace App\Controller;

use App\Entity\Activity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        return $this->render('default/homepage.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
    public function Activity()
    {
        $activity = $this->getDoctrine()->getRepository(Activity::class)->findAll();

        return $this->render("default/_activity.html.twig",[
            "activity" => $activity
        ]);
    }
}
