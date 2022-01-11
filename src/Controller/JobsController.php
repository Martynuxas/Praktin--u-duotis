<?php

namespace App\Controller;
use App\Entity\Jobs;
use App\Form\JobsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class JobsController extends AbstractController
{
    /**
     * @Route("createJob", name="createJob")
     */
    public function create(Request $request){
        $job = new Jobs();
        $form = $this->createForm(JobsType::class, $job);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($job);
            $em->flush();
            
            $this->addFlash('notification','Submitted successfully!');

            return $this->redirectToRoute('doneJobs');
        }

        return $this->render('Jobs/createJob.html.twig', ['form' => $form->createView()]);
    }
    /**
     * @Route("/updateJob/{id}", name="updateJob")
     */
    public function update(Request $request, $id){
        
        $job = $this->getDoctrine()->getRepository(Jobs::class)->find($id);
        $form = $this->createForm(JobsType::class, $job);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($job);
            $em->flush();
            
            $this->addFlash('notification','Updated successfully!');

            return $this->redirectToRoute('doneJobs');
        }

        return $this->render('Jobs/updateJob.html.twig', ['form' => $form->createView()]);
    }
    /**
     * @Route("/deleteJob/{id}", name="deleteJob")
     */
    public function delete($id){
        $data = $this->getDoctrine()->getRepository(Jobs::class)->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($data);
        $em->flush();
            
        $this->addFlash('notification','Deleted successfully!');

        return $this->redirectToRoute('doneJobs');

    }


}
