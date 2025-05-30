import mysql.connector
from mysql.connector import Error

class DBConnectie:
    
    def __init__(self):
        self.connection = self.create_connection
    
    def create_connection(self):
        connection = None
        try:
            connection = mysql.connector.connect(
                host='localhost',
                database='users',
                user='root',
                password="qM%z%f3EAbiK@%ua"
            )
            if connection.is_connected():
                print("Connected to MySQL Server version", connection.get_server_info())
                return connection
        except Error as e:
            print("Error while connecting to MySQL", e)
            if connection:
                connection.close()
        return connection

    def close_connection(self, connection):
        if connection and connection.is_connected():
            connection.close()
            print("MySQL connection is closed")
            