<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 23/02/2019
 * Time: 18:32
 */

namespace CommunauteBundle\Entity;

use  Doctrine\ORM\EntityRepository;


class EvenementRepository extends EntityRepository
{
    public function displayeventsbyparts(){
       return $this->createQueryBuilder('e')->orderBy('e.nbParticipants','DESC')->getQuery()->setMaxResults(5)->getResult();
    }
}