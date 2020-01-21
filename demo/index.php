<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use SE\Component\BMEcat\SchemaValidator;

require __DIR__.'/../vendor/autoload.php';

AnnotationRegistry::registerLoader('class_exists');

$data = [
    'document' => [
        'header' =>[
            'generator_info' => 'DocumentTest Document',
            'catalog' => [
                'language'  => 'deu',
                'id'        => 'MY_CATALOG',
                'version'   => '00.01',
                'datetime'  => [
                    'date' => '1979-01-01',
                    'time' => '10:59:54',
                    'timezone' => '+01:00',
                ]
            ],
            'supplier' => [
                'id'    => 'BMECAT_TEST',
                'name'  => 'TestSupplier',
            ]
        ]
    ]
];

$builder = new \SE\Component\BMEcat\DocumentBuilder();
$builder->build();
$builder->load($data);

$catalog = new \SE\Component\BMEcat\Node\NewCatalogNode;
$builder->getDocument()->setNewCatalog($catalog);

$xml = $builder->toString();

echo $xml;

var_export(SchemaValidator::isValid($xml, '2005.1'));