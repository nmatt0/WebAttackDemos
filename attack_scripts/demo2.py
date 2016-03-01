import requests

c = {'isAdmin' : '1'}
url = "http://192.168.1.3/demo/demo2.php"
r = requests.get(url, verify=False, cookies=c)
print r.text
