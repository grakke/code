package com.example.design_pattern.factory.framework;

// 模版模式
public abstract class Factory {

    public final Product create(String owner) {
        Product p = createProduct(owner);
        registerProduct(p);

        return p;
    }

    protected abstract Product createProduct(String owner);

    protected abstract void registerProduct(Product p);
}
