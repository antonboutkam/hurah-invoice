<?php
namespace Hurah\Invoice\Generator\Result\Handler;

use Hurah\Invoice\Generator\Document\InvoiceDocumentTypeInterface;
use Hurah\Invoice\Generator\Result\ResultHandlerInterface;

final class Download implements ResultHandlerInterface
{
    private InvoiceDocumentTypeInterface $type;

	/**
	 * Download::__construct()
     * @param string $document
     * @param InvoiceDocumentTypeInterface $type
     */
	public function __construct(){}

    public function setType(InvoiceDocumentTypeInterface $type)
    {
        $this->type = $type;
    }
    public function handle(string $document):string
    {
        header("Content-type: {$this->type->getContentType()}");
        header('Content-Disposition: attachment; filename="invoice.pdf"');
        echo $document;
        return $document;
    }
}
