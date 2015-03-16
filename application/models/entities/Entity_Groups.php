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
     * @var string $metaKey
     *
     * @Column(name="meta_key", type="string", length=255, nullable=true)
     */
    private $metaKey;

    /**
     * @var text $description
     *
     * @Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string $createdAt
     *
     * @Column(name="created_at", type="string", nullable=false)
     */
    private $createdAt;

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
     * Set metaKey
     *
     * @param string $metaKey
     */
    public function setMetaKey($metaKey = null)
    {
        $this->metaKey = $metaKey;
    }

    /**
     * Get metaKey
     *
     * @return string 
     */
    public function getMetaKey()
    {
        return $this->metaKey;
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
     * Set createdAt
     *
     * @param string $createdAt
     */
    public function setCreatedAt($createdAt = null)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Get createdAt
     *
     * @return string 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
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