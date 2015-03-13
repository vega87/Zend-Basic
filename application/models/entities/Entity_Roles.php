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
     * @var string $key
     *
     * @Column(name="key", type="string", length=255, nullable=true)
     */
    private $key;

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
     * Set key
     *
     * @param string $key
     */
    public function setKey($key = null)
    {
        $this->key = $key;
    }

    /**
     * Get key
     *
     * @return string 
     */
    public function getKey()
    {
        return $this->key;
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