<?php
declare(strict_types=1);

namespace App\Serializer;


use App\Entity\Attendee;
use App\Entity\Workshop;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class EntityToStringNormalizer implements ContextAwareNormalizerInterface
{
    /** @var ObjectNormalizer */
    private $objectNormalizer;

    public function __construct(ObjectNormalizer $objectNormalizer)
    {
        $this->objectNormalizer = $objectNormalizer;
    }

    public function supportsNormalization($data, $format = null, array $context = [])
    {
        return $data instanceof Attendee || $data instanceof Workshop;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $defaultContext = [
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                return $object->__toString();
            },
        ];
        $context = array_merge($defaultContext, $context);
        $data = $this->objectNormalizer->normalize($object, $format, $context);

        return $data;
    }
}
