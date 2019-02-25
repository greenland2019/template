<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 12/02/2019
 * Time: 00:04
 */

namespace CommunauteBundle\Entity;

use  Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="CommunauteBundle\Entity\EvenementRepository")
 */

class Evenement
{

    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */

    private $id;
    /**
     * @ORM\Column(type="datetime")
     */
    private $dateEvent;

    /**
     * @ORM\Column(type="string")
     */
    private $type;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbParticipants;

    /**
     * @ORM\Column(type="text")
     */
    private $lieu;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="text")
     */
    private $affiche;


    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $nbParticipants
     */
    public function setNbParticipants($nbParticipants)
    {
        $this->nbParticipants = $nbParticipants;
    }

    /**
     * @return mixed
     */
    public function getNbParticipants()
    {
        return $this->nbParticipants;
    }

    /**
     * @return mixed
     */
    public function getDateEvent()
    {
        return $this->dateEvent;
    }

    /**
     * @return mixed
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $dateEvent
     */
    public function setDateEvent($dateEvent)
    {
        $this->dateEvent = $dateEvent;
    }

    /**
     * @param mixed $lieu
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getAffiche()
    {
        return $this->affiche;
    }

    /**
     * @param mixed $affiche
     */
    public function setAffiche($affiche)
    {
        $this->affiche = $affiche;
    }


}