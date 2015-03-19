<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Entity_Passwords
 *
 * @Table(name="Passwords")
 * @Entity(repositoryClass="Repository_Passwords")
 */
class Entity_Passwords extends \MWD_Doctrine_Entity_Abstract
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
     * @var string $name
     *
     * @Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var text $description
     *
     * @Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var text $password
     *
     * @Column(name="password", type="text", nullable=true)
     */
    private $password;

    /**
     * @var Entity_Groups
     *
     * @ManyToOne(targetEntity="Entity_Groups")
     * @JoinColumns({
     *   @JoinColumn(name="group_id", referencedColumnName="id")
     * })
     */
    private $group;

    /**
     * @var Entity_Users
     *
     * @ManyToOne(targetEntity="Entity_Users")
     * @JoinColumns({
     *   @JoinColumn(name="created_by", referencedColumnName="id")
     * })
     */
    private $createdBy;



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
     * Set name
     *
     * @param string $name
     */
    public function setName($name = null)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description = null)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set password
     *
     * @param text $password
     */
    public function setPassword($password = null)
    {
        $this->password = $password;
    }

    /**
     * Get password
     *
     * @return text 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set group
     *
     * @param Entity_Groups $group
     */
    public function setGroup(\Entity_Groups $group = null)
    {
        $this->group = $group;
    }

    /**
     * Get group
     *
     * @return Entity_Groups 
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Set createdBy
     *
     * @param Entity_Users $createdBy
     */
    public function setCreatedBy(\Entity_Users $createdBy = null)
    {
        $this->createdBy = $createdBy;
    }

    /**
     * Get createdBy
     *
     * @return Entity_Users 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }
}