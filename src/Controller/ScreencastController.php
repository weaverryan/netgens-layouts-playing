<?php

namespace App\Controller;

use App\Entity\Screencast;
use App\Repository\ScreencastRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ScreencastController extends AbstractController
{
    #[Route('/screencasts', name: 'app_screencast_index')]
    public function index(ScreencastRepository $screencastRepository)
    {
        $screencasts = $screencastRepository->findAll();

        return $this->render('screencast/index.html.twig', [
            'screencasts' => $screencasts,
        ]);
    }

    #[Route('/screencasts/{id}', name: 'app_screencast_show')]
    public function show(Screencast $screencast)
    {
        return $this->render('screencast/show.html.twig', [
            'screencast' => $screencast,
        ]);
    }
}
