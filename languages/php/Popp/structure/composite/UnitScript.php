<?php

namespace Popp\structure\composite;

class UnitScript
{
    public static function joinExisting(
        Unit $newUnit,
        Unit $occupyingUnit,
    ): CompositeUnit {
        $comp = $occupyingUnit->getComposite();
        if (!is_null($comp)) {
            $comp->addUnit($newUnit);
        } else {
            $comp = new Army();
            $comp->addUnit($occupyingUnit);
            $comp->addUnit($newUnit);
        }
        return $comp;
    }
}
