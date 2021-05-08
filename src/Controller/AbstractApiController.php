<?php


namespace App\Controller;


use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

abstract class AbstractApiController extends AbstractController
{

    /**
     * @var Serializer
     */
    protected $serializer;

    /**
     * TherapyTypeController constructor.
     */
    public function __construct()
    {
        $defaultContext = [
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                return $object->getId();
            },
        ];

        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer(null, null, null, null, null, null, $defaultContext), new DateTimeNormalizer()];

        $this->serializer = new Serializer($normalizers, $encoders);
    }

    protected function getUsername(): string
    {
        return $this->getUser()->getUsername();
    }

    protected function getUserId(): int
    {
        /** @var User $user */
        $user = $this->getUser();
        return $user->getId();
    }


}