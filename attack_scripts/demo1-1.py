import requests
import sys

ua = "Windows / IE 8: Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0)"
h = {'User-Agent': ua}
url = "http://192.168.1.3/demo/demo1.php"
r = requests.get(url, verify=False, headers=h)
print r.text
