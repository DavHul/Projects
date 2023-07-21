import requests
import json
import time

while True:
    response = requests.get("https://jotihunt.nl/api/2.0/subscriptions")
    #print(response.status_code)
    if response.status_code == 429:
        break
    #print(response.json())
    #for group in response.json()["data"]:
    #    print(group)
    groepen = response.json()["data"]
    groep_file = open('data_groepen.json', 'w')
    groep_file.write(json.dumps(groepen))
    groep_file.close()

    response = requests.get("https://jotihunt.nl/api/2.0/areas")
    if response.status_code == 429:
        break
    #print(response.status_code)
    #print(response.json())
    status_vossen = response.json()["data"]
    vossen_file = open('data_vossen.json', 'w')
    vossen_file.write(json.dumps(status_vossen))
    vossen_file.close()

    response = requests.get("https://jotihunt.nl/api/2.0/articles")
    #print(response.status_code)
    if response.status_code == 429:
        break
    #print(response.json())
    berichten = response.json()["data"]
    berichten_file = open('data_berichten.json', 'w')
    berichten_file.write(json.dumps(berichten))
    berichten_file.close()

    time.sleep(2.5)