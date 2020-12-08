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

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\ConfigInterface;
use Magento\Framework\GraphQl\Query\Resolver\Argument\FieldEntityAttributesInterface;

/**
 * Class CategoryFilterArgument
 *
 * @package Ves\TestimonialGraphQl\Model\Resolver
 */
class CategoryFilterArgument implements FieldEntityAttributesInterface {
    /** @var ConfigInterface */
    private $config;

    /**
     * CategoryFilterArgument constructor.
     *
     * @param \Magento\Framework\GraphQl\ConfigInterface $config
     */
    public function __construct( ConfigInterface $config )
    {
        $this->config = $config;
    }

    /**
     * @return array
     */
    public function getEntityAttributes(): array
    {
        $fields = [];
        /** @var Field $field */
        foreach ( $this->config->getConfigElement( 'TestimonialCategory' )->getFields() as $field ) {
            $fields[ $field->getName() ] = [
                'type'      => 'String',
                'fieldName' => $field->getName(),
            ];
        }

        return $fields;
    }
}
