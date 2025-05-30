class User:
  
  def __init__(self, firstName, lastName, password, id=None,):
    self.firstName = firstName
    self.lastName = lastName
    self.password = password
    self.id = id
    
  def getFirstName(self):
    return self.firstName
  
  def getLastName(self):
    return self.lastName
  
  def getId(self):
    return self.id
  
  def getPassword(self):
    return self.password
  
  def setFirstName(self, name):
    self.firstName = name
    
  def setLastName(self, name):
    self.lastName = name
    
  def setPassword(self, password):
    self.password = password
    