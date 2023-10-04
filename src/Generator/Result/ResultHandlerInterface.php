<?php

namespace Hurah\Invoice\Generator\Result;

use Hurah\Invoice\Generator\Document\InvoiceDocumentTypeInterface;

interface ResultHandlerInterface
{
    public function __construct();
    public function setType(InvoiceDocumentTypeInterface $type);
    public function handle(string $document): string;
}
