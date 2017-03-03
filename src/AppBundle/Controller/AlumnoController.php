<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Alumno;
use AppBundle\Form\Type\AlumnoType;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AlumnoController extends Controller
{

    /**
     * @Route("/alumnos", name="listar_alumnos")
     */
    public function listarAlumnosAction()
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        $alumnos = $em->createQueryBuilder()
            ->select('a')
            ->addSelect('g')
            ->from('AppBundle:Alumno', 'a')
            ->join('a.grupo', 'g')
            ->orderBy('a.apellidos')
            ->addOrderBy('a.nombre')
            ->getQuery()
            ->getResult();

        return $this->render('alumno/listar.html.twig', [
            'alumnos' => $alumnos
        ]);
    }

    /**
     * @Route("/alumnos/nuevo", name="nuevo_alumno")
     * @Route("/alumnos/modificar/{id}", name="modificar_alumno")
     */
    public function formAlumnoAction(Request $request, Alumno $alumno = null)
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        if (null == $alumno) {
            $alumno = new Alumno();
            $em->persist($alumno);
        }

        $form = $this->createForm(AlumnoType::class, $alumno);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $em->flush();
                $this->addFlash('estado', 'Cambios guardados con éxito.');
                return $this->redirectToRoute('listar_alumnos');
            } catch (\Exception $e) {
                $this->addFlash('error', 'Error al guardar.');
            }
        }

        return $this->render('alumno/form.html.twig', [
            'alumno' => $alumno,
            'formulario' => $form->createView()
        ]);
    }

}
