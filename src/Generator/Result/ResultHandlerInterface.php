<?php

namespace Hurah\Invoice\Generator\Result;

use Hurah\Invoice\Generator\Document\InvoiceDocumentTypeInterface;

interface ResultHandlerInterface
{
    public function __construct(string $document, InvoiceDocumentTypeInterface $type);
    public function handle(): string;
}
