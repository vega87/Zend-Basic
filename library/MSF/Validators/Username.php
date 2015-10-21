<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XeroX
 * Date: 29.03.13
 * Time: 20:18
 * To change this template use File | Settings | File Templates.
 */
/** @see Zend_Validate_Abstract */
require_once 'Zend/Validate/Abstract.php';

/**
 * @category   Zend
 * @package    Zend_Validate
 * @copyright  Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class MSF_Validators_Username extends Zend_Validate_Abstract
{
    /**
     * Error codes
     * @const string
     */
    const ALREADY_EXISTS      = 'notSame';

    /**
     * Error messages
     * @var array
     */
    protected $_messageTemplates = array(
        self::ALREADY_EXISTS      => "Benutzername existiert schon",
    );

    /**
     * Sets validator options
     *
     * @param  mixed $token
     * @return void
     */
    public function __construct()
    {
    }


    /**
     * Defined by Zend_Validate_Interface
     *
     * Returns true if and only if a token has been set and the provided value
     * matches that token.
     *
     * @param  mixed $value
     * @param  array $context
     * @return boolean
     */
    public function isValid($value)
    {
        $this->_setValue((string) $value);

        $db = Zend_Registry::get('entitymanager');
        $username = $db->getRepository('Entity_User')->findBy(Array('username'=>$value));

        if(!empty($username)){
            $this->_error(self::ALREADY_EXISTS);
            return false;
        }

        return true;
    }
}
