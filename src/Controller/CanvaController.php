<?php
namespace App\Controller;

use App\Repository\PixelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CanvaController extends AbstractController
{
    #[Route('/', name: 'canva')]
    public function index(PixelRepository $pixelRepository): Response
    {
        $pixels = $pixelRepository->findAll();

        return $this->render('canva/index.html.twig', [
            'controller_name' => 'CanvaController',
            'pixelsjson' => json_encode($pixels)
        ]);
    }
}