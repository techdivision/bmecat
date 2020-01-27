<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use http\Header;
use Naugrim\BMEcat\DocumentBuilder;
use Naugrim\BMEcat\Exception\SchemaValidationException;
use Naugrim\BMEcat\Nodes\CatalogNode;
use Naugrim\BMEcat\Nodes\DateTimeNode;
use Naugrim\BMEcat\Nodes\DocumentNode;
use Naugrim\BMEcat\Nodes\HeaderNode;
use Naugrim\BMEcat\Nodes\NewCatalogNode;
use Naugrim\BMEcat\Nodes\ProductDetailsNode;
use Naugrim\BMEcat\Nodes\ProductNode;
use Naugrim\BMEcat\Nodes\ProductOrderDetailsNode;
use Naugrim\BMEcat\Nodes\ProductPriceDetailsNode;
use Naugrim\BMEcat\Nodes\ProductPriceNode;
use Naugrim\BMEcat\Nodes\SupplierNode;
use Naugrim\BMEcat\SchemaValidator;

require __DIR__.'/../vendor/autoload.php';

AnnotationRegistry::registerLoader('class_exists');

$builder = new DocumentBuilder();

$document = DocumentNode::fromArray([
    'header' => [
        'catalog' => [
            'language' => 'deu',
            'id' => 'MY_CATALOG',
            'version' => '00.01',
            'dateTime' => [
                'dateTime' => new DateTimeImmutable()
            ]
        ],
        'supplier' => [
            'id' => 'TestSupplierIdentification',
            'name' => 'TestSupplier',
        ],
    ],
    'newCatalog' => [
        'products' => [
            [
                'id' => 'Product-Number-1',
                'details' => [
                    'descriptionShort' => 'A short Description for Product-Number-1',
                ],
                'orderDetails' => [
                    'orderUnit' => 'C62',
                    'contentUnit' => 'C62',
                ],
                'priceDetails' => [
                    [
                        'prices' => [
                            [
                                'type' => 'net_list',
                                'price' => 123.45,
                                'priceFactor' => 0.8,
                            ]
                        ]
                    ]
                ]
            ],
            [
                'id' => 'Product-Number-2',
                'details' => [
                    'descriptionShort' => 'A short Description for Product-Number-2',
                ],
                'orderDetails' => [
                    'orderUnit' => 'C62',
                    'contentUnit' => 'C62',
                ],
                'priceDetails' => [
                    [
                        'prices' => [
                            [
                                'type' => 'net_list',
                                'price' => 1000,
                            ]
                        ]
                    ]
                ],
            ]
        ]
    ]
]);

$builder->setDocument($document);
$xml = $builder->toString();

try {
    SchemaValidator::isValid($xml, '2005.1');
} catch (SchemaValidationException $exception) {
    echo $exception->__toString();
    die();
}


echo $xml;

