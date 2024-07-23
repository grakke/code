package com.example.design_pattern.di_container;

import java.io.InputStream;
import java.util.List;

public interface BeanConfigParser {
    List parse(InputStream inputStream);

    List parse(String configContent);
}
