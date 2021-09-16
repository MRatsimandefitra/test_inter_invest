<?php

namespace App\Manager;

use App\Entity\Societe;
use Doctrine\ORM\EntityManagerInterface;
use Gedmo\Loggable\Entity\LogEntry;

class SocieteManager {

    private $em; 
    private $logRepository;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->logRepository = $em->getRepository(LogEntry::class);
        $this->repository = $em->getRepository(Societe::class);
    }

    public function revert(Societe $societe, array $criteria) {
        $logEntry = $this->logRepository->findOneBy($criteria);
        if ($logEntry) {
            $this->logRepository->revert($societe, $logEntry->getVersion());
            $this->em->persist($societe);
            $this->em->flush();
        }
        return $societe;
    }
}