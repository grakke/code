import unittest

from selenium import webdriver
from selenium.webdriver import Keys
from selenium.webdriver.common.by import By

from functional_tests.base import FunctionalTest


class NewVisitorTest(FunctionalTest):
    def test_can_start_a_list_for_one_user(self):
        # 伊迪丝听说有一个很酷的在线待办事项应用,去看了应用的首页
        self.browser.get(self.live_server_url)

        # 注意到网页的标题和头部都包含“To-Do”这个词
        self.assertIn("To-Do", self.browser.title)
        header_text = self.browser.find_element(By.TAG_NAME, "h1").text
        self.assertIn('To-Do', header_text)

        # 应用邀请她输入一个待办事项
        inputbox = self.browser.find_element(By.ID, 'id_new_item')
        self.assertEqual(inputbox.get_attribute('placeholder'), 'Enter a to-do item')

        # 在一个文本框中输入“Buy peacock feathers”
        inputbox.send_keys(' Buy peacock feathers')
        inputbox.send_keys(Keys.ENTER)
        self.wait_for_row_in_list_table('1: Buy peacock feathers')
        # 伊迪丝的爱好是使用假蝇做饵钓鱼,按回车键后，页面更新
        # 待办事项表格中显示了“1: Buy peacock feathers”

        # 页面中又显示了一个文本框，可以输入其他的待办事项
        # 输入“Use peacock feathers to make a fly”
        inputbox = self.browser.find_element(By.ID, 'id_new_item')
        inputbox.send_keys('Use peacock feathers to make a fly')
        inputbox.send_keys(Keys.ENTER)

        # 页面再次更新，清单中显示了这两个待办事项
        self.wait_for_row_in_list_table('1: Buy peacock feathers')
        self.wait_for_row_in_list_table('2: Use peacock feathers to make a fly')

        # 伊迪丝想知道这个网站是否会记住她的清单,看到网站为她生成了一个唯一的URL,而且页面中有一些文字解说这个功能
        # self.fail('Finish the test!')
        # 访问那个URL，发现她的待办事项列表还在

    def test_multiple_users_can_start_lists_at_different_urls(self):
        # 伊迪丝新建一个待办事项清单
        self.browser.get(self.live_server_url)
        inputbox = self.browser.find_element(By.ID, 'id_new_item')
        inputbox.send_keys('Buy peacock feathers')
        inputbox.send_keys(Keys.ENTER)
        self.wait_for_row_in_list_table('1: Buy peacock feathers')
        # 她注意到清单有个唯一的URL
        edith_list_url = self.browser.current_url
        self.assertRegex(edith_list_url, '/lists/.+')

        # 现在一名叫作弗朗西斯的新用户访问了网站
        # 使用一个新浏览器会话
        # 确保伊迪丝的信息不会从cookie中泄露出去
        self.browser.quit()

        self.browser = webdriver.Firefox()
        # 弗朗西斯访问首页,页面中看不到伊迪丝的清单
        self.browser.get(self.live_server_url)
        page_text = self.browser.find_element(By.TAG_NAME, 'body').text
        self.assertNotIn('Buy peacock feathers', page_text)
        self.assertNotIn('make a fly', page_text)
        # 弗朗西斯输入一个新待办事项，新建一个清单,不像伊迪丝那样兴趣盎然
        inputbox = self.browser.find_element(By.ID, 'id_new_item')
        inputbox.send_keys('Buy milk')
        inputbox.send_keys(Keys.ENTER)
        self.wait_for_row_in_list_table('1: Buy milk')

        # 弗朗西斯获得了他的唯一URL
        francis_list_url = self.browser.current_url
        self.assertRegex(francis_list_url, '/lists/.+')
        self.assertNotEqual(francis_list_url, edith_list_url)
        # 这个页面还是没有伊迪丝的清单
        page_text = self.browser.find_element(By.TAG_NAME, 'body').text
        self.assertNotIn('Buy peacock feathers', page_text)
        self.assertIn('Buy milk', page_text)
        # 两人都很满意，然后去睡觉了
