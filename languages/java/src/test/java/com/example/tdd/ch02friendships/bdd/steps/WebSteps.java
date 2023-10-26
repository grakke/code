package com.example.tdd.ch02friendships.bdd.steps;


import org.jbehave.core.annotations.Given;
import org.jbehave.core.annotations.Then;
import org.jbehave.core.annotations.When;
import org.openqa.selenium.By;

import static com.codeborne.selenide.Selenide.*;
import static org.hamcrest.MatcherAssert.assertThat;
import static org.hamcrest.Matchers.containsString;

public class WebSteps {
    @Given("I go to Wikipedia homepage")
    public void goToWikiPage() {
        open("http://en.wikipedia.org/wiki/Main_Page");
    }

    @When("I enter the value $value on a field named " + "$fieldName")
    public void enterValueOnFieldByName(String value, String fieldName){
        $(By.name(fieldName)).setValue(value);
    }
    @When("I click the button $buttonName")
    public void clickButonByName(String buttonName){
        $(By.name(buttonName)).click();
    }

    @Then("the page title contains $title")
    public void pageTitleIs(String title) {
        assertThat(title(), containsString(title));
    }
}
