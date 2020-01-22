<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use SE\Component\BMEcat\DocumentBuilder;
use SE\Component\BMEcat\Exception\SchemaValidationException;
use SE\Component\BMEcat\Node\DateTimeNode;
use SE\Component\BMEcat\Node\NewCatalogNode;
use SE\Component\BMEcat\Node\SupplierNode;
use SE\Component\BMEcat\SchemaValidator;

require __DIR__.'/../vendor/autoload.php';

AnnotationRegistry::registerLoader('class_exists');

$builder = new DocumentBuilder();
$builder->build();
$document = $builder->getDocument();

$header = $document->getHeader();
$catalogHeader = $header->getCatalog();
$catalogHeader
    ->setLanguage('deu')
    ->setId('MY_CATALOG')
    ->setVersion('00.01')
    ->setDateTime(
        (new DateTimeNode())->setDate('2020-01-01')
    )
    ;
$header->setSupplier(
    (new SupplierNode())->setId('TestSupplierIdentification')
        ->setName('TestSupplier')
);

$catalog = new NewCatalogNode;

$document->setNewCatalog($catalog);

$xml = $builder->toString();

try {
    SchemaValidator::isValid($xml, '2005.1');
} catch (SchemaValidationException $exception) {
    echo $exception->__toString();
    die();
}


echo $xml;

