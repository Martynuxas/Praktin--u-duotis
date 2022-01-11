<?php

namespace App\Controller;

use App\Entity\Roads;
use App\Form\RoadsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RoadsController extends AbstractController
{
    /**
     * @Route("/createRoad", name="createRoad")
     */
    public function create(Request $request){
        $road = new Roads();
        $form = $this->createForm(RoadsType::class, $road);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($road);
            $em->flush();
            
            $this->addFlash('notification','Submitted successfully!');

            return $this->redirectToRoute('doneJobs');
        }

        return $this->render('Roads/createRoad.html.twig', ['form' => $form->createView()]);
    }
    /**
     * @Route("/updateRoad/{id}", name="updateRoad")
     */
    public function update(Request $request, $id){
        
        $road = $this->getDoctrine()->getRepository(Roads::class)->find($id);
        $form = $this->createForm(RoadsType::class, $road);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($road);
            $em->flush();
            
            $this->addFlash('notification','Updated successfully!');

            return $this->redirectToRoute('doneJobs');
        }

        return $this->render('Roads/updateRoad.html.twig', ['form' => $form->createView()]);
    }
    /**
     * @Route("/deleteRoad/{id}", name="deleteRoad")
     */
    public function delete($id){
        $data = $this->getDoctrine()->getRepository(Roads::class)->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($data);
        $em->flush();
            
        $this->addFlash('notification','Deleted successfully!');

        return $this->redirectToRoute('doneJobs');

    }
}
