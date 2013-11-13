<?php

class Administracion_ProyectosController extends Zend_Controller_Action
{

    /**
     * @var Bisna\Application\Container\DoctrineContainer
     *
     */
    protected $_doctrineContainer = null;

    /**
     * @var Doctrine\ORM\EntityManager
     *
     */
    protected $_em = null;

    public function init()
    {
        $this->_doctrineContainer = Zend_Registry::get('doctrine');
        $this->_em = $this->_doctrineContainer->getEntityManager();
    }

    public function indexAction()
    {
        $query = $this->_em->createQuery('Select p From My\Entity\Proyecto p order by p.creado DESC');

        $proyectos = $query->getResult();
        
        $this->view->proyectos = $proyectos;
        
        $this->view->messages = $this->_helper->flashMessenger->getMessages();
    }

    public function nuevoAction()
    {
        $form = new Administracion_Form_ProyectoForm();
        
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            
            $data = $this->getRequest()->getPost();
                
            if ($form->isValid($data)) {
                
                $proyecto = new My\Entity\Proyecto();
                $cliente = $this->_em->find('My\Entity\Cliente',$this->_getParam('id'));
                $proyecto->setNombre($form->nombre->getValue());
                $proyecto->setCliente($cliente);
                $this->_em->persist($proyecto);
                $this->_em->flush();

                $this->_helper->flashMessenger->addMessage('Proyecto Creado');
                $this->_helper->redirector('index');
            }
    }


}


}
