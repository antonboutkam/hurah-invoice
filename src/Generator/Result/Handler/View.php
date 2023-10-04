<?php
namespace Hurah\Invoice\Generator\Result\Handler;

use Hurah\Invoice\Generator\Document\InvoiceDocumentTypeInterface;
use Hurah\Invoice\Generator\Result\ResultHandlerInterface;

final class View implements ResultHandlerInterface
{
    private InvoiceDocumentTypeInterface $type;


    public function setType(InvoiceDocumentTypeInterface $type)
    {
        $this->type = $type;
    }
    /**
     * Download::__construct()
     * @param string $document
     * @param InvoiceDocumentTypeInterface $type
     */
    public function __construct(){}

    public function handle(string $document):string
    {
        header("Content-type: {$this->type->getContentType()}");
        echo $document;
        return $document;
    }
}
