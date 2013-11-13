<?php

class Administracion_ClientesController extends Zend_Controller_Action
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
        $query = $this->_em->createQuery('Select c From My\Entity\Cliente c order by c.creado DESC');

        $clientes = $query->getResult();
        
        $this->view->clientes = $clientes;
        
        $this->view->messages = $this->_helper->flashMessenger->getMessages();
    }

    public function nuevoAction()
    {
        $form = new Administracion_Form_ClienteForm();
        
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            
            $data = $this->getRequest()->getPost();
                
            if ($form->isValid($data)) {
                
                $cliente = new My\Entity\Cliente();
                
                $cliente->setNombre($form->nombre->getValue());
                $cliente->setEmail($form->email->getValue());
                $cliente->setTelefonos($form->telefonos->getValue());
                $cliente->setSitio($form->sitio->getValue());
                $cliente->setOtros($form->otros->getValue());
                
                $this->_em->persist($cliente);
                $this->_em->flush();

                $this->_helper->flashMessenger->addMessage('Cliente Creado');
                $this->_helper->redirector('index');
            }
        }
        
    }


}



