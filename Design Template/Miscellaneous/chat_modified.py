import sched
import sys
import threading
import time

from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.action_chains import ActionChains
from selenium.common.exceptions import WebDriverException as WebDriverException

config = {
    'chromedriver_path': '/home/utkarsh/Downloads/chromedriver',
    'ww_url': "https://web.whatsapp.com/"
}

driver = webdriver.Chrome(config['chromedriver_path'])

driver.get(config['ww_url'])
def sendMsg(driver, msg):
    """
    Type 'msg' in 'driver' and press RETURN
    """
    # select correct input box to type msg
    input_box = driver.find_element(By.XPATH, '//*[@id="main"]//footer//div[contains(@class, "input")]')
    # input_box.clear()
    input_box.click()
    action = ActionChains(driver)
    action.send_keys(msg)
    action.send_keys(Keys.RETURN)
    action.perform()
foo = 0
while True:
    foo = foo + 1
    print('Outermost continuous loop ',foo)
    unread_list = driver.find_elements_by_class_name("unread")
    print('length of unread_list ',len(unread_list))

    for i in range(0,len(unread_list)):
        print('i ',i)
        unread_message = unread_list[i].find_elements_by_class_name("last-msg")[0].text
        #print(unread_message)
        unread_list[i].click()
        if(unread_message=="password"):
            print('entered if')
            sendMsg(driver,"Valid")
            time.sleep(1)
        else:
            print('entered else')
            sendMsg(driver,"Invalid")
            time.sleep(1)
    time.sleep(1)

