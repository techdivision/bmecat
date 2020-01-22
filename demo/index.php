<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use http\Header;
use SE\Component\BMEcat\DocumentBuilder;
use SE\Component\BMEcat\Exception\SchemaValidationException;
use SE\Component\BMEcat\Node\CatalogNode;
use SE\Component\BMEcat\Node\DateTimeNode;
use SE\Component\BMEcat\Node\DocumentNode;
use SE\Component\BMEcat\Node\HeaderNode;
use SE\Component\BMEcat\Node\NewCatalogNode;
use SE\Component\BMEcat\Node\ProductDetailsNode;
use SE\Component\BMEcat\Node\ProductNode;
use SE\Component\BMEcat\Node\ProductOrderDetailsNode;
use SE\Component\BMEcat\Node\ProductPriceDetailsNode;
use SE\Component\BMEcat\Node\ProductPriceNode;
use SE\Component\BMEcat\Node\SupplierNode;
use SE\Component\BMEcat\SchemaValidator;

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

