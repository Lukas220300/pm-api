<?php


namespace App\Controller;


use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class UserController extends AbstractController
{
    /**
     * @Route("/api/me", name="me", methods={"GET"})
     */
    public function me() {
        $user = $this->getUser();
        if(!$user) {
            return new JsonResponse('{}');
        }

        $defaultContext = [
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                return $object->getId();
            },
        ];

        $encoder = [new JsonEncoder()];
        $normalizer = [new ObjectNormalizer(null, null, null, null, null, null, $defaultContext)];

        $serializer = new Serializer($normalizer, $encoder);

        $normalizedUser = $serializer->normalize($user);
        unset(
            $normalizedUser['password'],
            $normalizedUser['salt'],
            $normalizedUser['asymmetricKeyPair'],
            $normalizedUser['entries'],
        );

        return new JsonResponse($serializer->encode($normalizedUser,'json') );
    }

}