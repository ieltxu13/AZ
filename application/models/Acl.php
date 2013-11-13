<?php

/**
 * Description of Acl
 *
 * @author root
 */

class Application_Model_Acl extends Zend_Acl
{
    
    public function __construct()
    {
        $this->addRole(new Zend_Acl_Role('invitado'));
        $this->addRole(new Zend_Acl_Role('administrador'),'invitado');
        
        $this->addResource(new Zend_Acl_Resource('default'))
             ->addResource(new Zend_Acl_Resource('default:index'),'default')
             ->addResource(new Zend_Acl_Resource('default:prototipos'),'default')
             ->addResource(new Zend_Acl_Resource('default:error'),'default');
        
        $this->addResource(new Zend_Acl_Resource('administracion'))
             ->addResource(new Zend_Acl_Resource('administracion:index'),'administracion')
             ->addResource(new Zend_Acl_Resource('administracion:error'),'administracion')
             ->addResource(new Zend_Acl_Resource('administracion:proyectos'),'administracion')
             ->addResource(new Zend_Acl_Resource('administracion:clientes'),'administracion')
             ->addResource(new Zend_Acl_Resource('administracion:mail'),'administracion');
        
        $this->allow('invitado', 'default:index','index')
             ->allow('invitado', 'default:error','error')
             ->allow('invitado', 'default:prototipos',array('index'))
             ->allow('invitado', 'administracion:error','error')
             ->allow('invitado', 'administracion:index','index');
        
        $this
             ->allow('administrador','administracion:index',array('salir'))
             ->allow('administrador','administracion:clientes',array('index','nuevo'))
             ->allow('administrador','administracion:mail',array('enviar-mail','index'))
             ->allow('administrador','administracion:proyectos',array('index','nuevo'))
             ->deny('administrador','administracion:index',array('index'));
        
    }
}
