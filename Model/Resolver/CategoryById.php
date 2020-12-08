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
 * Class CategoryById
 *
 * @package Ves\TestimonialGraphQl\Model\Resolver
 */
class CategoryById extends AbstractCategoryQuery implements ResolverInterface {
    /**
     * @inheritDoc
     */
    public function resolve( Field $field, $context, ResolveInfo $info, array $value = null, array $args = null )
    {
        $this->validateArgs( $args );

        return $this->_categoryRepository->get( $args['category_id'] );
    }
}
