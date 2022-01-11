<?php

namespace App\Controller;
use App\Entity\JobsDone;
use App\Entity\Jobs;
use App\Entity\Roads;
use App\Form\DoneJobsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use \Doctrine\Common\Collections\Criteria;

class DoneJobsController extends AbstractController
{
    /**
     * @Route("/", name="doneJobs")
     */
    public function index(): Response
    {
        $data = $this->getDoctrine()->getRepository(JobsDone::class)->findAll();
        $jobsdata = $this->getDoctrine()->getRepository(Jobs::class)->findAll();
        $roadsdata = $this->getDoctrine()->getRepository(Roads::class)->findAll();
        return $this->render('doneJobs/index.html.twig', [
            'doneJobs'=> $data,'jobs'=>$jobsdata,'roads'=>$roadsdata
        ]);
    }
    /**
     * @Route("createDoneJob", name="createDoneJob")
     */
    public function create(Request $request){
        $doneJob = new JobsDone();
        $form = $this->createForm(DoneJobsType::class, $doneJob);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $roadNumber = $form->get('Road')->getData()->getRoadNumber();
            $selectedStart = $form->get('SectionStart')->getData()->getSectionStart();
            $selectedEnd = $form->get('SectionEnd')->getData()->getSectionEnd();
            $roadByNumber = $em->getRepository(Roads::class)->findByRoadNumberStartAndEnd($roadNumber, $selectedStart, $selectedEnd);
            $allRoadLength = $selectedEnd-$selectedStart;

            $size = count($roadByNumber);
            $selectedQuantity = $form->get('Quantity')->getData();

            foreach ($roadByNumber as $road) {
                $thisRoadLength = $road->getSectionEnd() - $road->getSectionStart();
                $thisRoadPercentQuantity = ($thisRoadLength/$allRoadLength) * $selectedQuantity;
                $doneJob = new JobsDone();
                $doneJob->setCipher($form->get('Cipher')->getData());
                $doneJob->setRoad($road);
                $doneJob->setSectionStart($road);
                $doneJob->setSectionEnd($road);
                $doneJob->setQuantity($thisRoadPercentQuantity);
                $em->persist($doneJob);
                $em->flush();
         
            $this->addFlash('notification','Submitted successfully!');
            }
            return $this->redirectToRoute('doneJobs');
        }

        return $this->render('doneJobs/createDoneJob.html.twig', ['form' => $form->createView()]);
    }
    /**
     * @Route("/updateDoneJob/{id}", name="updateDoneJob")
     */
    public function update(Request $request, $id){
        
        $doneJob = $this->getDoctrine()->getRepository(JobsDone::class)->find($id);
        $form = $this->createForm(DoneJobsType::class, $doneJob);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($doneJob);
            $em->flush();
            
            $this->addFlash('notification','Updated successfully!');

            return $this->redirectToRoute('doneJobs');
        }

        return $this->render('doneJobs/updateDoneJob.html.twig', ['form' => $form->createView()]);
    }
    /**
     * @Route("/deleteDoneJob/{id}", name="deleteDoneJob")
     */
    public function delete($id){
        $data = $this->getDoctrine()->getRepository(JobsDone::class)->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($data);
        $em->flush();
            
        $this->addFlash('notification','Deleted successfully!');

        return $this->redirectToRoute('doneJobs');

    }


}
