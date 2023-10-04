<?php
namespace Hurah\Invoice\Generator\Result\Handler;

use Hurah\Invoice\Generator\Document\InvoiceDocumentTypeInterface;
use Hurah\Invoice\Generator\Result\ResultHandlerInterface;

final class ReturnString implements ResultHandlerInterface
{


    /**
     * Download::__construct()
     * @param string $document
     * @param InvoiceDocumentTypeInterface $type
     */
    public function __construct(){}

    public function setType(InvoiceDocumentTypeInterface $type)
    {

    }

    public function handle(string $document):string
    {
        return $document;
    }
}
