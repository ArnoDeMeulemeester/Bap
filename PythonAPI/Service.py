from Repository import Repository
from User import User

class Service:
  
  def __init__(self, repository: Repository):
    self.repository = repository
    
    
  def getAllUsers(self):
    return self.repository.findAll()
  
  def getUserById(self, id):
    return self.repository.findById(id)
  
  def updateUser(self, id, user: User):
    updatedUser = User(user.firstName, user.lastName, user.password, id)
    return self.repository.save(updatedUser)
  
  def saveUser(self, user: User):
    return self.repository.save(user)
  
  def deleteUser(self, id):
    return self.repository.delete(id)