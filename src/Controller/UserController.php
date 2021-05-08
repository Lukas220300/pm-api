<?php


namespace App\Controller;


use App\Entity\KeyPair;
use App\Entity\PrivateKey;
use App\Entity\PublicKey;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class UserController extends AbstractApiController
{

    /**
     * @Route("/api/user/keyPair", name="setKeyPair", methods={"POST"})
     *
     *
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function updateKeyPair(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $data = $request->getContent();
        if(!$data) { return new JsonResponse(['code' => '290798a6-135a-4dd4-98cf-ac0de4b2ffd2', 'message' => 'No data found.'], JsonResponse::HTTP_BAD_REQUEST); }
        $keys = $this->serializer->decode($data, 'json');

        if(!$keys['publicKey']) {
            return new JsonResponse(['code' => '9a40c5bc-5683-41ab-b976-753d9e5d79de', 'message' => 'Value "publicKey" is not set.'], JsonResponse::HTTP_BAD_REQUEST);
        }
        if(!$keys['privateKey']) {
            return new JsonResponse(['code' => '79ba36e0-c144-48d3-b921-c3b1ab2d84f4', 'message' => 'Value "privateKey" is not set.'], JsonResponse::HTTP_BAD_REQUEST);
        }

        $date = new DateTime('now');

        $publicKey = new PublicKey();
        $publicKey->setKey($keys['publicKey']);
        $publicKey->setCreated($date);

        $privateKey = new PrivateKey();
        $privateKey->setKey($keys['privateKey']);
        $privateKey->setCreated($date);
        if($keys['salt']) {
            $privateKey->setSalt($keys['salt']);
        }

        $keyPair = new KeyPair();
        $keyPair->setPrivateKey($privateKey);
        $keyPair->setPublicKey($publicKey);

        $updated = false;
        $user = $this->getUser();
        if($user->getKeyPair()) {
            if(!isset($keys['force'])) {
                return new JsonResponse(['code' => 'eab1517b-356d-4455-b32a-fee99be19d23', 'message' => 'User has already a keypair. To override it add "force":true'], JsonResponse::HTTP_BAD_REQUEST);
            }
            if(!$keys['force']) {
                return new JsonResponse(['code' => 'eab1517b-356d-4455-b32a-fee99be19d23', 'message' => 'User has already a keypair. To override it add "force":true'], JsonResponse::HTTP_BAD_REQUEST);
            }
            $user->setKeyPair($keyPair);
            $updated = true;
        } else {
            $user->setKeyPair($keyPair);
        }

        $entityManager->persist($user);
        $entityManager->persist($keyPair);
        $entityManager->persist($publicKey);
        $entityManager->persist($privateKey);

        $entityManager->flush();

        $status = 'KeyPair stored';
        if($updated) {$status = 'KeyPair updated';}

        return new JsonResponse(['status' => $status], JsonResponse::HTTP_CREATED);
    }


}