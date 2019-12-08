import json
import requests
import random

class FakeUserAgentClass():

    def __init__(self):
        self.base_url = "https://fake-useragent.herokuapp.com/browsers/0.1.8"
        
        self.fake_useragent_file = open("fake_useragent_file.json", "r")
        self.fake_useragent_list = []
        try:
            self.data = json.load(self.fake_useragent_file)
            for i in self.data["browsers"]:
                for j in self.data["browsers"][i]:
                    self.fake_useragent_list.append(j)
            print(10*" >> ", "Got new Fake User-Agents !")
        except:
            self.get_list()
            self.__init__()

    def get_list(self):
        fake_useragent_file = open("fake_useragent_file.json", "w")
        try:
            page = requests.get(self.base_url).json()
            json.dump(page, fake_useragent_file)
        except Exception as e:
            print(e)
        fake_useragent_file.close()

    def random(self):
        return random.choice(self.fake_useragent_list)
