<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Entity_Groups
 *
 * @Table(name="Groups")
 * @Entity(repositoryClass="Repository_Groups")
 */
class Entity_Groups extends \MWD_Doctrine_Entity_Abstract
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
     * @var Entity_Roles
     *
     * @ManyToMany(targetEntity="Entity_Roles", mappedBy="group")
     */
    private $role;

    public function __construct()
    {
        $this->role = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

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
     * Add role
     *
     * @param Entity_Roles $role
     */
    public function addEntity_Roles(\Entity_Roles $role)
    {
        $this->role[] = $role;
    }

    /**
     * Get role
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getRole()
    {
        return $this->role;
    }
}