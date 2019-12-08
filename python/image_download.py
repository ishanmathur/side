import requests

class ImageDownloadClass():

    def __init__(self):
        self.not_found_file = open('notfound.txt', 'a')

    def down_image(self, url, dest, prxy, ua):
        try:
            page = requests.get(url, headers = {'User-Agent': ua}, proxies = {'http': prxy}, stream = True)
            with open(dest, 'wb') as out_file:
                out_file.write(page.content)
        except Exception as e:
            self.not_found_file.write(url+'\n')
            print(e)
