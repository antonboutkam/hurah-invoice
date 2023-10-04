<?php
namespace Hurah\Invoice\Generator\Result\Handler;

use Hurah\Invoice\Generator\Document\InvoiceDocumentTypeInterface;
use Hurah\Invoice\Generator\Result\ResultHandlerInterface;

final class ReturnString implements ResultHandlerInterface
{
	private string $document;

    /**
     * Download::__construct()
     * @param string $document
     * @param InvoiceDocumentTypeInterface $type
     */
    public function __construct(string $document, InvoiceDocumentTypeInterface $type)
    {
        $this->document = $document;
    }

    public function handle():string
    {
        return $this->document;
    }
}
