<?php

namespace Popp\ch3;

class ShopProduct implements Chargable, IdentityObject
{
    use PriceUtilities;
    use IdentityTrtait;

    public const AVAILABLE = 0;
    public const OUT_OF_STOCK = 1;

    protected int|float $discount = 0;
    protected int $id = 0;

    // 最新语法
    public function __construct(
        private string      $title = "",
        private string      $producerMainName = "",
        private string      $producerFirstName = "",
        protected int|float $price = 0,
    ) {
    }

    public static function getInstance(int $id, \PDO $pdo): ShopProduct|null
    {
        $stmt = $pdo->prepare("select * from products where id=?");
        $result = $stmt->execute([$id]);

        $row = $stmt->fetch();
        if (empty($row)) {
            return null;
        }
        if ($row['type'] == "book") {
            $product = new BookProduct(
                $row['title'],
                $row['firstname'],
                $row['mainname'],
                (float)$row['price'],
                (int)$row['numpages']
            );
        } elseif ($row['type'] == "cd") {
            $product = new CdProduct(
                $row['title'],
                $row['firstname'],
                $row['mainname'],
                (float)$row['price'],
                (int)$row['playlength']
            );
        } else {
            $firstname = (is_null($row['firstname'])) ? "" : $row['firstname'];
            $product = new ShopProduct(
                $row['title'],
                $firstname,
                $row['mainname'],
                (float)$row['price']
            );
        }
        $product->setId((int)$row['id']);
        $product->setDiscount((int)$row['discount']);

        return $product;
    }

    public function setID($id): void
    {
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPrice(): float
    {
        return ($this->price - $this->getDiscount());
    }

    public function getDiscount(): float
    {
        return $this->discount;
    }

    public function setDiscount($num): void
    {
        $this->discount = $num;
    }


    public function getProducerFirstName(): string
    {
        return $this->producerFirstName;
    }

    public function getProducerMainName(): string
    {
        return $this->producerMainName;
    }
    
    public function getProducer(): string
    {
        return $this->getProducerFirstName() . " . " . $this->getProducerMainName();
    }

    public function getSummeryLine(): string
    {
        return $this->title . " ( " . $this->getProducer() .  " ) ";
    }

    public function getTaxRate(): float
    {
        return 25;
    }
}
