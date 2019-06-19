<?php
/**
 * Created by PhpStorm.
 * User: Joshua
 * Date: 19/06/2019
 * Time: 13:10
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Song;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class SongController
 * @package AppBundle\Controller
 * @Route("/songs")
 */
class SongController extends Controller
{
    /**
     * @Method("GET")
     * @Route("/")
     */
    public function getAllSongs() {
        //The entity manager gets the data from the database
        $songs = $this->getDoctrine()->getRepository('AppBundle:Song')->findAll();

        //Serializes the ORM objects from database
        $songs = $this->get('jms_serializer')->serialize($songs, 'json');

        return new Response($songs);
    }

    /**
     * @Method("GET")
     * @Route("/{id}")
     */
    public function getSongById(Song $id) {
        //$song = $this->getDoctrine()->getRepository('AppBundle:Song')->find($id);
        //The serializer finds the element with the id in the url
        $song = $this->get('jms_serializer')->serialize($id, 'json');

        return new Response($song);

    }
}