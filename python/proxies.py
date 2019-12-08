from bs4 import BeautifulSoup
import requests

class ProxiesClass():
    def get_proxies(self):
        prxy_lst = []
        proxysite = requests.get('https://free-proxy-list.net/')
        proxysoup = BeautifulSoup(proxysite.content, 'html.parser')
        proxybody = proxysoup.find('tbody')
        tr = proxybody.find_all('tr')
        for i in tr:
            td = i.find_all('td')
            prxy_lst.append(str(td[0].text)+':'+str(td[1].text))
        print(10*' * ', "Getting new proxies")
        return prxy_lst
    
