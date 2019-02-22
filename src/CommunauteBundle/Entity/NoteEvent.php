<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 20/02/2019
 * Time: 02:27
 */

namespace CommunauteBundle\Entity;


use  Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */

class NoteEvent
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */

    private $id;
    /**
     * @ORM\Column(type="integer")
     */
    private $note;

    /**
     * @ORM\OneToOne(targetEntity="PLantsBundle\Entity\Personne")
     */

    private $noteur;

    /**
     * @ORM\ManyToOne(targetEntity="Evenement")
     */

    private $evenement;

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

    /**
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param mixed $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * @return mixed
     */
    public function getNoteur()
    {
        return $this->noteur;
    }

    /**
     * @param mixed $noteur
     */
    public function setNoteur($noteur)
    {
        $this->noteur = $noteur;
    }

    /**
     * @return mixed
     */
    public function getEvenement()
    {
        return $this->evenement;
    }

    /**
     * @param mixed $evenement
     */
    public function setEvenement($evenement)
    {
        $this->evenement = $evenement;
    }


}