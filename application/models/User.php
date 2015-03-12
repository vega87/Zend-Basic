<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=64, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=64, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="pw_hash", type="string", length=255, nullable=false)
     */
    private $pwHash;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="sessid", type="string", length=26, nullable=false)
     */
    private $sessid;

    /**
     * @var integer
     *
     * @ORM\Column(name="time_session", type="integer", nullable=false)
     */
    private $timeSession;

    /**
     * @var integer
     *
     * @ORM\Column(name="time_created", type="integer", nullable=false)
     */
    private $timeCreated;

    /**
     * @var integer
     *
     * @ORM\Column(name="time_lastpwchange", type="integer", nullable=false)
     */
    private $timeLastpwchange;


    public function getId(){
        return $this->id;
    }
        
    public function getName(){
        return $this->name;
    }
        
    public function getEmail(){
        return $this->email;
    }
        
    public function getPwHash(){
        return $this->pwHash;
    }
        
    public function getStatus(){
        return $this->status;
    }
        
    public function getSessid(){
        return $this->sessid;
    }
        
    public function getTimeSession(){
        return $this->timeSession;
    }
        
    public function getTimeCreated(){
        return $this->timeCreated;
    }
        
    public function getTimeLastpwchange(){
        return $this->timeLastpwchange;
    }
        
    public function setId( $value ){
        $this->id = $value;
    }
        
    public function setName( $value ){
        $this->name = $value;
    }
        
    public function setEmail( $value ){
        $this->email = $value;
    }
        
    public function setPwHash( $value ){
        $this->pwHash = $value;
    }
        
    public function setStatus( $value ){
        $this->status = $value;
    }
        
    public function setSessid( $value ){
        $this->sessid = $value;
    }
        
    public function setTimeSession( $value ){
        $this->timeSession = $value;
    }
        
    public function setTimeCreated( $value ){
        $this->timeCreated = $value;
    }
        
    public function setTimeLastpwchange( $value ){
        $this->timeLastpwchange = $value;
    }
}