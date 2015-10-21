<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XeroX
 * Date: 24.03.13
 * Time: 23:42
 * To change this template use File | Settings | File Templates.
 */

abstract class MSF_Doctrine_Entity_Abstract {
    public function toArray() {
        $refObj = new ReflectionClass($this);
        $myClassName = get_called_class();

        if(in_array("Doctrine\ORM\Proxy\Proxy", $refObj->getInterfaceNames())) {
            $propertyList = $this->_buildPropertyListByProxy($refObj, $myClassName);
        } else {
            $propertyList = $refObj->getProperties();
        }

        $newArray = array();
        foreach($propertyList as $property) {
            $methodName = TecBase_Helper_Doctrine::buildGetter($property->name);

            try {
                $refMethod = new ReflectionMethod($myClassName, $methodName);
            } catch(Exception $e) {
                pred($e->getMessage());
            }

            $result = $refMethod->invoke($this);

            if(is_object($result)) {
                $newArray[$property->name] = $result->toArray();
            } else {
                if(is_int($result)) {
                    $result = (int)$result;
                }
                $newArray[$property->name] = $result;
            }
        }

        if(empty($newArray)) {
            return array();
        } else {
            return $newArray;
        }
    }

    public function fromArray($array) {
        if(empty($array)) {
            return true;
        }

        $myClassName = get_called_class();
        foreach($array as $key => $ar) {
            if($ar instanceOf TecBase_System_Controller_Request_Value) {
                $methodName = TecBase_Helper_Doctrine::buildSetter($key);

                if(!method_exists($this, $methodName)) {

                    if(substr($methodName, strlen($methodName)-2,strlen($methodName)) == "Id") {

                        $newMethodName = substr($methodName,0,strlen($methodName)-2);

                        if(!method_exists($this, $newMethodName)) {
                            continue;
                        }

                        if(is_numeric($ar->get())) {

                            $entityName = TecBase_Helper_Doctrine::buildEntityName(str_replace("_id", "", $key));

                            if(!class_exists($entityName, false)) {
                                continue;
                            }

                            $entity = Zend_Registry::get("db")->getRepository($entityName)->find($ar->get());

                            if(!empty($entity)) {
                                try {
                                    $refMethod = new ReflectionMethod($myClassName, $newMethodName);
                                } catch(Exception $e) {
                                    pred($e->getMessage());
                                }
                                $refMethod->invokeArgs($this, array($entity));
                            }
                        }
                    }

                    continue;
                }

                try {

                    $refMethod = new ReflectionMethod($myClassName, $methodName);
                } catch(Exception $e) {
                    pred($e->getMessage());
                }
                $refMethod->invokeArgs($this, array($ar->get()));
            }
        }

    }

    public function toSingleArray($depth = 0) {
        if($depth == 2) {
            return "**RECURSION**";
        }

        $refObj = new ReflectionClass($this);
        $myClassName = get_called_class();

        if(in_array("Doctrine\ORM\Proxy\Proxy", $refObj->getInterfaceNames())) {
            $propertyList = $this->_buildPropertyListByProxy($refObj, $myClassName);
        } else {
            $propertyList = $refObj->getProperties();
        }

        $newArray = array();
        foreach($propertyList as $property) {
            $methodName = TecBase_Helper_Doctrine::buildGetter($property->name);

            try {
                $refMethod = new ReflectionMethod($myClassName, $methodName);
            } catch(Exception $e) {
                pred($e->getMessage());
            }

            $result = $refMethod->invoke($this);

            if($result instanceOf Doctrine\ORM\PersistentCollection) {
                continue;
            }

            if(is_object($result)) {
                $newArray[$property->name] = $result->toSingleArray($depth+1);

                if(empty($newArray[$property->name]) || $newArray[$property->name] == "**RECURSION**") {
                    $newArray[$property->name] = null;
                } else {
                    foreach($newArray[$property->name] as $key => $val) {
                        $newArray[$property->name."_".$key] = $val;
                    }

                    unset($newArray[$property->name]);
                }

            } else {
                if(is_int($result)) {
                    $result = (int)$result;

                }
                $newArray[$property->name] = $result;
            }
        }

        if(empty($newArray)) {
            return array();
        } else {
            return $newArray;
        }
    }

    private function _buildPropertyListByProxy($refObj, $myClassName) {
        $parentClass = $refObj->getParentClass();
        $parentObj = new ReflectionClass($parentClass->name);
        return $parentObj->getProperties();
    }

    public function getRepository(){
        $refObj = new ReflectionClass($this);
        $myClassName = get_called_class();

        $docClass = $refObj->getDocComment();
        $matches = preg_match("/\"Repository_(.*)\"/", $docClass, $output_array);

        $repoClass = str_replace('"','',$output_array[0]);

        $em = Zend_Registry::get('entitymanager');

        $class = $em->getRepository($myClassName);

        return $class;
    }
}