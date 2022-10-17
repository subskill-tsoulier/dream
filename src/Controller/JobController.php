<?php

namespace App\Controller;

use App\Entity\JobSearch;
use App\Form\JobSearchType;
use App\Repository\JobRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class JobController extends AbstractController
{
    public function __construct(JobRepository $jobRepository, HttpClientInterface $client)
    {
        $this->jobRepository = $jobRepository;
        $this->client = $client;
    }

    /**
      * @Route("/job", name="app_job")
     */
    public function index(PaginatorInterface $paginator, Request $request): Response
    {

        $search = new JobSearch();
        $form = $this->createForm(JobSearchType::class, $search);
        $form->handleRequest($request);
        
        $jobs = $paginator->paginate(
            $this->jobRepository->findByParamsUrl($search),
            $request->query->getInt('page', 1),
            12,
        );

        return $this->render('job/index.html.twig', [
            'jobs' => $jobs,
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
