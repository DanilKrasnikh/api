import requests
import urllib3
from requests.auth import HTTPBasicAuth

nsourl = 'http://iap.nso.ru/gasu/api/XmlData/py'
au = HTTPBasicAuth('user', 'pass')

proxies = {
  "http": "http://user:pass@proxy:8080",
  "https": "http://user:pass@proxy:8080",
}
r = requests.put(nsourl, data=open("pyxml.txt", "r", encoding="utf-8"), auth=au, proxies=proxies)
print(r)
print(r.text)
