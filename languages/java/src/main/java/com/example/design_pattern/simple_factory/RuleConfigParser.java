package com.example.design_pattern.simple_factory;

public class RuleConfigParser implements IRuleConfigParser {
    public RuleConfig parse(String s) {
        return new RuleConfig();
    }
}
