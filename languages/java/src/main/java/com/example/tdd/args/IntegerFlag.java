package com.example.tdd.args;

public class IntegerFlag implements IFlag {
    private static final String TYPE = "integer";
    private final Object value;

    public IntegerFlag(Object value) {
        this.value = value;
    }

    @Override
    public String getType() {
        return TYPE;
    }

    @Override
    public Object getDefaultValue() {
        return 0;
    }

    @Override
    public Object getValue() {
        return Integer.valueOf(value.toString());
    }

    @Override
    public Boolean isTypeOf(String type) {
        return TYPE.equals(type);
    }
}
