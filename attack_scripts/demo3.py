import requests
import sys

d = {'username' : 'admin' , 'password':'admin'}
url = "http://192.168.1.3/demo/demo3.php"
r = requests.post(url, data=d)
print r.text
