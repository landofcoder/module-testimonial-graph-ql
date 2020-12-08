<?php
/**
 * Landofcoder
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Landofcoder.com license that is
 * available through the world-wide-web at this URL:
 * https://landofcoder.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Landofcoder
 * @package     Ves_TestimonialGraphQl
 * @copyright   Copyright (c) Landofcoder (https://landofcoder.com/)
 * @license     https://landofcoder.com/LICENSE.txt
 */

declare( strict_types=1 );

namespace Ves\TestimonialGraphQl\Model\Resolver;

use Magento\Framework\GraphQl\Query\Resolver\Argument\SearchCriteria\Builder as SearchCriteriaBuilder;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Ves\Testimonial\Api\CategoryRepositoryInterface;

/**
 * Class AbstractTestimonialQuery
 *
 * @package Ves\TestimonialGraphQl\Model\Resolver
 */
abstract class AbstractCategoryQuery {
    /**
     * @var SearchCriteriaBuilder
     */
    protected $searchCriteriaBuilder;

    /**
     * @var CategoryRepositoryInterface
     */
    protected $_categoryRepository;

    /**
     * AbstractCategoryQuery constructor.
     *
     * @param \Magento\Framework\GraphQl\Query\Resolver\Argument\SearchCriteria\Builder $searchCriteriaBuilder
     * @param \Ves\Testimonial\Api\CategoryRepositoryInterface                          $categoryRepository
     */
    public function __construct(
        SearchCriteriaBuilder $searchCriteriaBuilder,
        CategoryRepositoryInterface $categoryRepository
    )
    {
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->_categoryRepository   = $categoryRepository;
    }

    /**
     * @param array $args
     *
     * @throws GraphQlInputException
     */
    protected function validateArgs( array $args )
    {
        if ( ! isset( $args['category_id'] ) ) {
            throw new GraphQlInputException( __( 'Category id is required.' ) );
        }
    }
}
