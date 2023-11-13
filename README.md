# hurah-invoice
Invoice generation library for Hurah based on [twig](https://circleci.com/gh/antonboutkam/hurah-invoice.svg?style=svg) template engine and 
[wkhtmltopdf](https://wkhtmltopdf.org/).


### Translations
Invoices can be translated by passing an array containing the translations to 
the Environment object. If the translation is missing the default is shown which 
also serves as the key.

```php
$translation = [
    'VAT percentage' => 'BTW percentage'
];
$structure = new Structure();
$structure->setInvoice($yourInvoiceData);
$environment = $structure->getEnvironment();
$environment->setTranslation($translation);

// See tests for full invoice generation example.

```

```
{{ 'VAT percentage'|translate }} "BTW percentage" 
{{ 'I am missing'|translate }} becomes "I am missing" 
```

![circleci](https://circleci.com/gh/antonboutkam/hurah-invoice.svg?style=svg)


