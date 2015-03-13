<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Entity_Users
 *
 * @Table(name="Users")
 * @Entity(repositoryClass="Repository_Users")
 */
class Entity_Users extends \MWD_Doctrine_Entity_Abstract
{
    /**
     * @var integer $id
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $firstname
     *
     * @Column(name="firstname", type="string", length=80, nullable=true)
     */
    private $firstname;

    /**
     * @var string $lastname
     *
     * @Column(name="lastname", type="string", length=80, nullable=true)
     */
    private $lastname;

    /**
     * @var string $password
     *
     * @Column(name="password", type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @var string $username
     *
     * @Column(name="username", type="string", length=12, nullable=true)
     */
    private $username;

    /**
     * @var string $email
     *
     * @Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var Entity_Roles
     *
     * @ManyToOne(targetEntity="Entity_Roles")
     * @JoinColumns({
     *   @JoinColumn(name="role_id", referencedColumnName="id")
     * })
     */
    private $role;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     */
    public function setFirstname($firstname = null)
    {
        $this->firstname = $firstname;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     */
    public function setLastname($lastname = null)
    {
        $this->lastname = $lastname;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password = null)
    {
        $this->password = $password;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username = null)
    {
        $this->username = $username;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email = null)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set role
     *
     * @param Entity_Roles $role
     */
    public function setRole(\Entity_Roles $role = null)
    {
        $this->role = $role;
    }

    /**
     * Get role
     *
     * @return Entity_Roles 
     */
    public function getRole()
    {
        return $this->role;
    }
}