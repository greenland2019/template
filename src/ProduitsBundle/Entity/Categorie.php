<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 11/02/2019
 * Time: 23:30
 */

namespace ProduitsBundle\Entity;
use  Doctrine\ORM\Mapping as ORM;
use  PLantsBundle\Entity\Personne;

/**
 * @ORM\Entity
 */


class Categorie
{

    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */

    private $id;
    /**
     * @ORM\Column(type="string",length=50)
     */
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity="PLantsBundle\Entity\Personne")
     */

    private $artisan;

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getArtisan()
    {
        return $this->artisan;
    }

    /**
     * @return mixed
     */
    public function getIdCat()
    {
        return $this->id_cat;
    }

    /**
     * @param mixed $artisan
     */
    public function setArtisan($artisan)
    {
        $this->artisan = $artisan;
    }

    /**
     * @param mixed $id_cat
     */
    public function setIdCat($id_cat)
    {
        $this->id_cat = $id_cat;
    }

}