<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 12/02/2019
 * Time: 00:25
 */

namespace CommunauteBundle\Entity;
use PLantsBundle\Entity\Personne;

use  Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */

class Participation
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */

    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="PLantsBundle\Entity\Personne")
     */

    private $participant;

    /**
     * @ORM\ManyToOne(targetEntity="Evenement")
     */

    private $evenement;

    /**
     * @return mixed
     */
    public function getEvenement()
    {
        return $this->evenement;
    }

    /**
     * @return mixed
     */
    public function getparticipant()
    {
        return $this->participant;
    }

    /**
     * @param mixed $evenement
     */
    public function setEvenement($evenement)
    {
        $this->evenement = $evenement;
    }

    /**
     * @param mixed $participant
     */
    public function setparticipant($participant)
    {
        $this->participant = $participant;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
}