import requests

d = {'username' : 'admin' , 'password':'admin'}
url = "http://ctf.nmatt.com/demo3.php"
r = requests.post(url, data=d)
print(r.text)
