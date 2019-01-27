<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function homeAction(Request $request)
    {
        return $this->render('frontal/index.html.twig');
    }

    /**
     * @Route("/songs-list", name="songs")
     */
    public function songsAction(Request $request)
    {
        return $this->render('frontal/songs.html.twig');
    }

    /**
     * @Route("/options/{option}", name="options")
     */
    public function optionsAction(Request $request, $option="change-options")
    {
        return $this->render('frontal/options.html.twig', array("option" => $option));
    }

}
