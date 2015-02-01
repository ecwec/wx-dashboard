<?php

namespace Ecwec\Bundle\WeatherDataProviderBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ecwec\Bundle\WeatherDataProviderBundle\Entity\Station;
use Ecwec\Bundle\WeatherDataProviderBundle\Form\StationType;

/**
 * Station controller.
 *
 */
class StationController extends Controller
{

    /**
     * Lists all Station entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('WeatherDataProviderBundle:Station')->findAll();

        return $this->render('WeatherDataProviderBundle:Station:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Station entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Station();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('station_show', array('id' => $entity->getId())));
        }

        return $this->render('WeatherDataProviderBundle:Station:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Station entity.
     *
     * @param Station $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Station $entity)
    {
        $form = $this->createForm(new StationType(), $entity, array(
            'action' => $this->generateUrl('station_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Station entity.
     *
     */
    public function newAction()
    {
        $entity = new Station();
        $form   = $this->createCreateForm($entity);

        return $this->render('WeatherDataProviderBundle:Station:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Station entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WeatherDataProviderBundle:Station')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Station entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WeatherDataProviderBundle:Station:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Station entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WeatherDataProviderBundle:Station')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Station entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WeatherDataProviderBundle:Station:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Station entity.
    *
    * @param Station $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Station $entity)
    {
        $form = $this->createForm(new StationType(), $entity, array(
            'action' => $this->generateUrl('station_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Station entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WeatherDataProviderBundle:Station')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Station entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('station_edit', array('id' => $id)));
        }

        return $this->render('WeatherDataProviderBundle:Station:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Station entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('WeatherDataProviderBundle:Station')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Station entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('station'));
    }

    /**
     * Creates a form to delete a Station entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('station_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
