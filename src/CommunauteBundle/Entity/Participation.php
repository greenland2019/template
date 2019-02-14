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

    private $partcipant;

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
    public function getPartcipant()
    {
        return $this->partcipant;
    }

    /**
     * @param mixed $evenement
     */
    public function setEvenement($evenement)
    {
        $this->evenement = $evenement;
    }

    /**
     * @param mixed $partcipant
     */
    public function setPartcipant($partcipant)
    {
        $this->partcipant = $partcipant;
    }
}