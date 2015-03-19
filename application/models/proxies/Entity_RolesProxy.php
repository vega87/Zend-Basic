<?php

namespace Proxies_;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class Entity_RolesProxy extends \Entity_Roles implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    /** @private */
    public function __load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;

            if (method_exists($this, "__wakeup")) {
                // call this after __isInitialized__to avoid infinite recursion
                // but before loading to emulate what ClassMetadata::newInstance()
                // provides.
                $this->__wakeup();
            }

            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }
    
    
    public function getId()
    {
        $this->__load();
        return parent::getId();
    }

    public function setName($name = NULL)
    {
        $this->__load();
        return parent::setName($name);
    }

    public function getName()
    {
        $this->__load();
        return parent::getName();
    }

    public function setMetaKey($metaKey = NULL)
    {
        $this->__load();
        return parent::setMetaKey($metaKey);
    }

    public function getMetaKey()
    {
        $this->__load();
        return parent::getMetaKey();
    }

    public function setDescription($description = NULL)
    {
        $this->__load();
        return parent::setDescription($description);
    }

    public function getDescription()
    {
        $this->__load();
        return parent::getDescription();
    }

    public function setCreatedAt($createdAt = NULL)
    {
        $this->__load();
        return parent::setCreatedAt($createdAt);
    }

    public function getCreatedAt()
    {
        $this->__load();
        return parent::getCreatedAt();
    }

    public function addEntity_Groups(\Entity_Groups $group)
    {
        $this->__load();
        return parent::addEntity_Groups($group);
    }

    public function getGroup()
    {
        $this->__load();
        return parent::getGroup();
    }

    public function toArray()
    {
        $this->__load();
        return parent::toArray();
    }

    public function fromArray($array)
    {
        $this->__load();
        return parent::fromArray($array);
    }

    public function toSingleArray($depth = 0)
    {
        $this->__load();
        return parent::toSingleArray($depth);
    }

    public function getRepository()
    {
        $this->__load();
        return parent::getRepository();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'name', 'metaKey', 'description', 'createdAt', 'group');
    }

    public function __clone()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            $class = $this->_entityPersister->getClassMetadata();
            $original = $this->_entityPersister->load($this->_identifier);
            if ($original === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            foreach ($class->reflFields AS $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->_entityPersister, $this->_identifier);
        }
        
    }
}