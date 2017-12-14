<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Service\RandomImageGenerator;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $entityManager = $this->container
            ->get('doctrine.orm.entity_manager');
        $fiches = $entityManager
            ->getRepository('AppBundle:Fiche')
            ->findAll();

        dump($fiches);

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT f
            FROM AppBundle:Fiche f 
            WHERE f.ficheDate > :date'
        )->setParameter('date', new \Datetime());

        $fiches = $query->getResult();

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * @Route("/hello/{name}", name="hello")
     */
    public function helloAction(Request $request, $name)
    {
        // replace this example code with whatever you need
       	return $this->render('default/hello.html.twig', [
            'name' => $name
        ]);
    }

    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function dashboardAction(Request $request) {

        $entityManager = $this->container->get('doctrine.orm.entity_manager');

        $fiches = $entityManager->getRepository('AppBundle:Fiche')->findAll();
        $projects = $entityManager->getRepository('AppBundle:projet')->findAll();
        $managers = $entityManager->getRepository('AppBundle:manager')->findAll();

        // replace this example code with whatever you need
        return $this->render('dashboard/dashboard.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'fiches' => $fiches,
            'projets' => $projects,
            'managers' => $managers,
            $imageUrl = $this->container->get(RandomImageGenerator::class)->getRandomImageURL(),
            'imageUrl' => $imageUrl,
            'fiches' => $fiches,

        ]);
    }

}
