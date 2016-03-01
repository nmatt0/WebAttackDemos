import requests

d = {'username' : 'admin' , 'password':'admin'}
url = "http://192.168.1.3/demo/demo3.php"
r = requests.get(url)
c = r.cookies
r = requests.post(url, data=d, cookies=c )
print r.text
