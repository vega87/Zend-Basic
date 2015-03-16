<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Entity_Roles
 *
 * @Table(name="Roles")
 * @Entity(repositoryClass="Repository_Roles")
 */
class Entity_Roles extends \MWD_Doctrine_Entity_Abstract
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
     * @var Entity_Groups
     *
     * @ManyToMany(targetEntity="Entity_Groups", inversedBy="role")
     * @JoinTable(name="role_groups",
     *   joinColumns={
     *     @JoinColumn(name="role_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @JoinColumn(name="group_id", referencedColumnName="id")
     *   }
     * )
     */
    private $group;

    public function __construct()
    {
        $this->group = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add group
     *
     * @param Entity_Groups $group
     */
    public function addEntity_Groups(\Entity_Groups $group)
    {
        $this->group[] = $group;
    }

    /**
     * Get group
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getGroup()
    {
        return $this->group;
    }
}