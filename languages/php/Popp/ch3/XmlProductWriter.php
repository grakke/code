<?php

namespace Popp\ch3;

class XmlProductWriter extends ShopProductWriter
{

    public function write(): void
    {
        $writer = new \XMLWriter();
        $writer->openMemory();
        $writer->startDocument('1.0', 'UTF-8');
        $writer->startElement("products");
        foreach ($this->products as $shopProduct) {
            $writer->startElement("product");
            $writer->writeAttribute("title", $shopProduct->getTitle());
            $writer->startElement("summary");
            $writer->text($shopProduct->getSummaryLine());
            $writer->endElement(); // summary
            $writer->endElement(); // product
        }
        $writer->endElement(); // products
        $writer->endDocument();
        print $writer->flush();

        $writer->startElement("summary");
        $writer->text($shopProduct->getSummaryLine());
        $writer->endElement(); // summary
        $writer->endElement(); // product

        $writer->endElement(); // products
        $writer->endDocument();
        print $writer->flush();
    }
}
