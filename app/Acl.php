<?php
class Acl extends Kwf_Acl
{
    public function __construct()
    {
        parent::__construct();
        $this->remove('default_index');
        $this->addResource(new Kwf_Acl_Resource_MenuUrl('default_index',
                array('text'=>trlStatic('Customers (Ext2)'), 'icon'=>'user.png'),
                '/'));
            $this->addResource(new Zend_Acl_Resource('default_members'), 'default_index');
                $this->addResource(new Zend_Acl_Resource('default_member'), 'default_members');
                $this->addResource(new Zend_Acl_Resource('default_member-contacts'), 'default_members');
                    $this->addResource(new Zend_Acl_Resource('default_member-contact'), 'default_member-contacts');

        $this->add(new Kwf_Acl_Resource_MenuExt4('members',
            array('text'=>trlStatic('Customers (Ext4 MVC)'), 'icon'=>'user.png'),
            'Members'
        ));

        $this->add(new Zend_Acl_Resource('api'));
            $this->add(new Zend_Acl_Resource('api_members'), 'api');

        $this->allow('guest', 'default_index');
        $this->allow('guest', 'kwf_media_upload');
        $this->allow('guest', 'api');
        $this->allow('guest', 'members');
    }
}
