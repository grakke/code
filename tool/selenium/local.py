from webdriver_manager.chrome import ChromeDriverManager

from selenium import webdriver
from selenium.webdriver.chrome.service import Service as ChromeService
from selenium.webdriver.common.by import By
# from selenium.webdriver.common.keys import Keys


def test_eight_components():
    options = webdriver.ChromeOptions()
    options.add_experimental_option("excludeSwitches", ["enable-automation"])
    options.add_experimental_option("useAutomationExtension", False)
    service = ChromeService(executable_path="/usr/local/bin/chromedriver")
    driver = webdriver.Chrome(service=service, options=options)

    driver.get("https://www.selenium.dev/selenium/web/web-form.html")
    title = driver.title
    assert title == "Web form"

    driver.implicitly_wait(0.5)

    text_box = driver.find_element(by=By.NAME, value="my-text")
    submit_button = driver.find_element(by=By.CSS_SELECTOR, value="button")
    text_box.send_keys("Selenium")
    submit_button.click()

    message = driver.find_element(by=By.ID, value="message")
    value = message.text
    assert value == "Received!"
    driver.quit()


def test_file_upload():
    # 文件上传
    driver = webdriver.Chrome(ChromeDriverManager().install())
    driver.implicitly_wait(10)
    driver.get("https://the-internet.herokuapp.com/upload")
    driver.find_element(
        By.ID, "file-upload").send_keys("selenium-snapshot.jpg")
    driver.find_element(By.ID, "file-submit").submit()
    if (driver.page_source.find("File Uploaded!")):
        print("file upload success")
    else:
        print("file upload not successful")
    driver.quit()


def test_selector():
    driver = webdriver.Chrome()
    fruits = driver.find_element(By.ID, "fruits")
    fruit = fruits.find_element(By.CLASS_NAME, "tomatoes")
    fruit = driver.find_element(By.CSS_SELECTOR, "#fruits .tomatoes")

    plants = driver.find_elements(By.TAG_NAME, "li")
    for e in plants:
        print(e.text)

    # Get element with tag name 'div'
    element = driver.find_element(By.TAG_NAME, 'div')

    # Get all the elements available with tag name 'p'
    elements = element.find_elements(By.TAG_NAME, 'p')
    for e in elements:
        print(e.text)

# Get Active Element
    driver.get("https://www.google.com")
    driver.find_element(By.CSS_SELECTOR, '[name="q"]').send_keys("webElement")

    # Get attribute of current active element
    attr = driver.switch_to.active_element.get_attribute("title")
    print(attr)


def document_initialised(driver):
    return driver.execute_script("return initialised")


def test_waited():
    driver.navigate("file:///race_condition.html")
    WebDriverWait(driver, timeout=10).until(document_initialised)
    el = driver.find_element(By.TAG_NAME, "p")
    assert el.text == "Hello from JavaScript!"


def test_inactivate():
    driver = webdriver.Firefox()

    # Navigate to url
    driver.get("http://www.google.com")

    # Enter "webdriver" text and perform "ENTER" keyboard action
    SearchInput = driver.find_element(By.NAME, "q")
    SearchInput.send_keys("selenium")
    # Clears the entered text
    SearchInput.clear()


def test_alert():
    # Click the link to activate the alert
    driver.find_element(By.LINK_TEXT, "See an example alert").click()

    # Wait for the alert to be displayed and store it in a variable
    alert = wait.until(expected_conditions.alert_is_present())

    # Store the alert text in a variable
    text = alert.text

    # Press the OK button
    alert.accept()


def test_confirm():
    # Click the link to activate the alert
    driver.find_element(By.LINK_TEXT, "See a sample confirm").click()

    # Wait for the alert to be displayed
    wait.until(expected_conditions.alert_is_present())

    # Store the alert in a variable for reuse
    alert = driver.switch_to.alert

    # Store the alert text in a variable
    text = alert.text

    # Press the Cancel button
    alert.dismiss()


def test_prompt():
    # Click the link to activate the alert
    driver.find_element(By.LINK_TEXT, "See a sample prompt").click()

    # Wait for the alert to be displayed
    wait.until(expected_conditions.alert_is_present())

    # Store the alert in a variable for reuse
    alert = Alert(driver)

    # Type your message
    alert.send_keys("Selenium")

    # Press the OK button
    alert.accept()


def test_cookie():
    driver = webdriver.Chrome()

    # Navigate to url
    driver.get("http://www.example.com")

    # Adds the cookie into current browser context
    driver.add_cookie({"name": "foo", "value": "bar"})

    # Get cookie details with named cookie 'foo'
    print(driver.get_cookie("foo"))

    driver.add_cookie({"name": "test1", "value": "cookie1"})
    driver.add_cookie({"name": "test2", "value": "cookie2"})
    driver.add_cookie({"name": "foo", "value": "value", 'sameSite': 'Strict'})
    driver.add_cookie({"name": "foo1", "value": "value", 'sameSite': 'Lax'})

    # Get all available cookies
    print(driver.get_cookies())

    driver.delete_cookie("test1")
    #  Deletes all cookies
    driver.delete_all_cookies()
