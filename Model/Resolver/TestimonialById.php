<?php
/**
 * {
    lofTestimonialById(entity_id: 1)
    {
        testimonial_id
        name
        status
        product_image
        }
    }
 */

namespace Ves\TestimonialGraphQl\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

/**
 * Class TestimonialById
 *
 * @package Ves\TestimonialGraphQl\Model\Resolver
 */
class TestimonialById extends AbstractTestimonialQuery implements ResolverInterface {
    /**
     * @inheritDoc
     */
    public function resolve( Field $field, $context, ResolveInfo $info, array $value = null, array $args = null )
    {
        $this->validateArgs( $args );

        return $this->_testimonialRepository->get( $args['testimonial_id'] );
    }
}
