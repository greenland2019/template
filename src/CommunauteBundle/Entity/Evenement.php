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
 * @ORM\Entity
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
    private $date_event;

    /**
     * @ORM\Column(type="string")
     */
    private $type;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb_participants;

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
     * @param mixed $nb_participants
     */
    public function setNbParticipants($nb_participants)
    {
        $this->nb_participants = $nb_participants;
    }

    /**
     * @return mixed
     */
    public function getNbParticipants()
    {
        return $this->nb_participants;
    }

    /**
     * @return mixed
     */
    public function getDateEvent()
    {
        return $this->date_event;
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
     * @param mixed $date_event
     */
    public function setDateEvent($date_event)
    {
        $this->date_event = $date_event;
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