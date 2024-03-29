package com.example.design_pattern.simple_factory;


import java.util.HashMap;
import java.util.Map;

// public class RuleConfigParserFactory {
//     public static IRuleConfigParser createParser(String configFormat) {
//         IRuleConfigParser parser = null;
//         if ("json".equalsIgnoreCase(configFormat)) {
//             parser = new JsonRuleConfigParser();
//         } else if ("xml".equalsIgnoreCase(configFormat)) {
//             parser = new XmlRuleConfigParser();
//         } else if ("yaml".equalsIgnoreCase(configFormat)) {
//             parser = new YamlRuleConfigParser();
//         } else if ("properties".equalsIgnoreCase(configFormat)) {
//             parser = new PropertiesRuleConfigParser();
//         }
//         return parser;
//     }
// }

public class RuleConfigParserFactory {
    private static final Map<String, RuleConfigParser> cachedParsers = new HashMap<>();

    static {
        cachedParsers.put("json", new JsonRuleConfigParser());
        cachedParsers.put("xml", new XmlRuleConfigParser());
        cachedParsers.put("yaml", new YamlRuleConfigParser());
        cachedParsers.put("properties", new PropertiesRuleConfigParser());
    }

    public static IRuleConfigParser createParser(String configFormat) {
        if (configFormat == null || configFormat.isEmpty()) {
            return null;//返回null还是IllegalArgumentException全凭你自己说了算
        }
        IRuleConfigParser parser = cachedParsers.get(configFormat.toLowerCase());

        return parser;
    }
}