<?php

namespace App\Controller;

use App\Entity\JobSearch;
use App\Form\JobSearchType;
use App\Repository\JobRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class JobController extends AbstractController
{
    public function __construct(JobRepository $jobRepository)
    {
        $this->jobRepository = $jobRepository;
    }

    /**
      * @Route("/job", name="app_job")
     */
    public function index(PaginatorInterface $paginator, Request $request): Response
    {

        $search = new JobSearch();
        $form = $this->createForm(JobSearchType::class, $search);
        $form->handleRequest($request);

        $paginator = $paginator->paginate(
            $this->jobRepository->findAll(),
            $request->query->getInt('page', 1),
            12,
        );

        return $this->render('job/index.html.twig', [
            'jobs' => $paginator,
            'form' => $form->createView(),
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
