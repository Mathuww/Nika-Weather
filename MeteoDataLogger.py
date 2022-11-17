import getpass
import mqttthreaddatalogger as MQTT # pour installer ce module tapez dans la console : python -m pip install mqttthreaddatalogger
import time

Username = input('Entrez votre identifiant MQTT : ')
pwd = getpass.getpass('Entrez votre mot de passe MQTT :')

auth = {
'username':Username,
'password':pwd
}

m = MQTT.mqttthreaddatalogger("mqtt.univ-cotedazur.fr",8443,auth["username"],auth["password"],"tcp")        # crée le thread
# remarque pour la connexion mqtt à partir d'un programme python il faut utiliser le port 8443 (tcp)
# le port 443 est utilisé par la communication mqtt avec une page web (websocket)
 
m .selectTopic(["FABLAB_21_22/STATION_METEO/PC/out/"])  # topics auquel on s'abonne
#m.selectTopic(["FABLAB_21_22/bureau/temperature/out/"])  # topics auquel on s'abonne
m.selectKey(["Temperature","Humidite","DirVent","VitVent","NbRaf","derniereendate","Precipitation","Vitprecipitation"]) # selection des clés des données voulues , les données seront dans m.data[0], m.data[1],... 
m.selectNomFichier("donnees.csv")
m.start()                  # démarre le thread, (exécution indépendante du programme principal)
#time.sleep(1)
#m.client.publish("node_iot2020/test/in",payload="{\"pression\":1024}",qos=0)#publication d'un message vers MQTT  

