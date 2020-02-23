<?php
// App\DataPersister\UserDataPersiste.php
namespace App\DataPersister;

use App\Entity\Contrat;
use App\Repository\ContratRepository;
use Doctrine\ORM\EntityManagerInterface;
use ApiPlatform\Core\DataPersister\DataPersisterInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ContratDataPersister implements DataPersisterInterface
 {
    private $userPasswordEncoder;
    public function __construct(EntityManagerInterface $entitymanager, UserPasswordEncoderInterface $userPasswordEncoder)
    {
        $this->userPasswordEncoder = $userPasswordEncoder;
        $this->entityManager = $entitymanager;
    }
    public function supports($data): bool
    {
        return $data instanceof Contrat;
        // TODO: Implement supports() method.
    }
   public function persist($data)
   {
    
    if ($data->getIntitule()) {
        // $data->setPassword(
        //     $this->userPasswordEncoder->encodePassword($data, $data->getPassword())
        // );
        dd($data);
        $data->eraseCredentials();
    }
      
       $this->entityManager->persist($data);
       $this->entityManager->flush();
   }
   public function remove($data)
   {
    $this->entityManager->remove($data);
    $this->entityManager->flush();
       // TODO: Implement remove() method.
   }
 }