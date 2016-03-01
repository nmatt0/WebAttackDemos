import requests
import sys

#url = sys.argv[1]
url = "http://192.168.1.3/demo/demo1.php"
r = requests.get(url, verify=False)
print r.text

