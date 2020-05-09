<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $content = 'page index changement post apache';
        return new Response(
            '<html><body>content: '.$content.'</body></html>'
        );
    }

    

    /**
     * @Route("/jsontest", name="jsontest")
     */
    public function jsontest()
    {
        $response = new Response();
        $response->setContent(json_encode([
            'data' => 123,
        ]));

        return $response;
    }
    
}