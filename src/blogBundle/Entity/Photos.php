<?php

namespace blogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Photos
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="blogBundle\Entity\PhotosRepository")
 */
class Photos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="blogBundle\Entity\Categories", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="categorie_nom", referencedColumnName="id", nullable=false)
     */
    protected $categorie;


    /**
     * @var integer
     *
     * @ORM\Column(name="position", type="integer")
     */
    private $position;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="contributeur", type="string", length=255)
     */
    private $contributeur;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;


  
    

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
     * Set position
     *
     * @param integer $position
     * @return Photos
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Photos
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set contributeur
     *
     * @param string $contributeur
     * @return Photos
     */
    public function setContributeur($contributeur)
    {
        $this->contributeur = $contributeur;

        return $this;
    }

    /**
     * Get contributeur
     *
     * @return string 
     */
    public function getContributeur()
    {
        return $this->contributeur;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Photos
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set categorie
     *
     * @param \blogBundle\Entity\Categories $categorie
     * @return Photos
     */
    public function setCategorie(\blogBundle\Entity\Categories $categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \blogBundle\Entity\Categories 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
}
