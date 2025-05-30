from User import User

class Repository:
  
  def __init__(self, connection):
    self.connection = connection
    self.cursor = connection.cursor()
    
  def findAll(self):
    query = "SELECT * FROM user"
    self.cursor.execute(query)
    record = self.cursor.fetchall()
    return record
  
  def findById(self, id):
    query = f"SELECT * FROM user WHERE id = {id}"
    self.cursor.execute(query)
    record = self.cursor.fetchall()
    return record
  
  def delete(self, id):
    existingUser = self.findById(id)
    if existingUser:
      query = f"DELETE FROM user WHERE id = {id}"
      try: 
        self.cursor.execute(query)
        self.connection.commit()
      except:
        self.connection.rollback()
      return self.findAll()
    else:
      return "Can't find user in database."
    
  def save(self, user: User):
    #if existingUser: # user already exists --> update
      query = f"UPDATE user SET first_name = '{user.getFirstName()}', last_name = '{user.getLastName()}', password = '{user.getPassword()}' WHERE id = {user.getId()}"
      try: 
        self.cursor.execute(query)
        self.connection.commit()
        record = self.findById(user.getId())
        return record
      except: 
      #else: # new user --> insert
        query = f"INSERT INTO user (first_name, last_name, password) VALUES ('{user.getFirstName()}', '{user.getLastName()}', '{user.getPassword()}')"
        try: 
          self.cursor.execute(query)
          self.connection.commit()
          record = self.findAll()[-1]
          return [record]
        except:
          return "Couldn't update table."