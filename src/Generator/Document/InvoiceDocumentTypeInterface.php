<?php

namespace Hurah\Invoice\Generator\Document;

use Hurah\Types\Type\Html;

interface InvoiceDocumentTypeInterface
{
    /**
     * Pdf::getContentType()
     * This method is automatically generated, as long as it is marked final it will be generated
     * @return string
     */
    public function getContentType(): string;

    public function convert(Html $input, array $aOptions = []):string;

}
