import requests

class FileDownloadClass():

    def __init__(self):
        self.not_found_file = open('notfound.txt', 'a')

    def down_file(self, url, dest, prxy=None, ua=None):
        try:
            page = requests.get(url, headers = {'User-Agent': ua}, proxies = {'http': prxy}, stream = True)
            with open(dest, 'wb') as out_file:
                out_file.write(page.content)
        except Exception as e:
            self.not_found_file.write(url+'\n')
            print(e)
