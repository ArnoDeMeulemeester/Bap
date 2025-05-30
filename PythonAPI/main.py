from DBConnectie import DBConnectie
from flask import Flask, request
from Repository import Repository
from Service import Service
from User import User

app = Flask(__name__)

@app.route("/api/users", methods=["GET", "POST"])
def getAllUsersOrInsertNewUser():
  if request.method == "GET":
    return service.getAllUsers()
  elif request.method == "POST":
    data = request.json
    user = User(data.get("firstName"), data.get("lastName"), data.get("password"))
    return service.saveUser(user)

@app.route("/api/users/<id>", methods=["GET", "DELETE", "PUT"])
def GetDeleteOrUpdateUser(id):
  if request.method == "GET":
    return service.getUserById(id)
  elif request.method == "DELETE":
    return service.deleteUser(id)
  elif request.method == "PUT":
    data = request.json
    user = User(data.get("firstName"), data.get("lastName"), data.get("password"), id)
    return service.updateUser(id, user)

db = DBConnectie()
connection = db.connection()
repo = Repository(connection)
service = Service(repo)

if connection:
  cursor = connection.cursor()
  cursor.execute("SELECT DATABASE();")
  record = cursor.fetchone()
  print("You're connected to database:", record[0])
  app.run(host='localhost', port=8080)    
  db.close_connection(connection)
