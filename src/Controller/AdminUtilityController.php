<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminUtilityController extends AbstractController
{
    /**
     * @Route("/admin/utility/users", methods="GET", name="admin_utility_users")
     *
     */
    public function getUsersApi(UserRepository $userRepository)
    {
        $users = $userRepository->findAllEmailAlphabetical();

        return $this->json($users, 200, [], [
            'groups' => ['email'],
        ]);
    }
}
