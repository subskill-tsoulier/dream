<?php

namespace App\Controller;

use App\Entity\Job;
use App\Repository\JobRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class JobController extends AbstractController
{
    public function __construct(JobRepository $jobRepository)
    {
        $this->jobRepository = $jobRepository;
    }

    /**
      * @Route("/job", name="app_job")
     */
    public function index(): Response
    {
        return $this->render('job/index.html.twig', [
            'jobs' => $this->jobRepository->findAll(),
        ]);
    }

    /**
      * @Route("/job/{slug}-{id}", name="app_job_show", requirements={"slug": "[a-z0-9\-]*"})
     */
    public function show($slug, $id): Response
    {
        return $this->render('job/show.html.twig', [
            'jobs' => $this->jobRepository->findById($id),
        ]);
    }
}
