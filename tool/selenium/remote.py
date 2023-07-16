from selenium import webdriver
from selenium.webdriver.remote.file_detector import LocalFileDetector

firefox_options = webdriver.FirefoxOptions()

driver = webdriver.Remote(
    command_executor='http://www.example.com',
    options=firefox_options
)

# driver.get("http://www.google.com")
driver.get("http://sso.dev.saucelabs.com/test/guinea-file-upload")
driver.find_element(By.ID, "myfile").send_keys(
    "/Users/sso/the/local/path/to/darkbulb.jpg")

driver.quit()
