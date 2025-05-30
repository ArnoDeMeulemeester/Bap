package org.example;

import org.example.User;

import java.util.List;

@SuppressWarnings("unused")
public interface Service {
    User getUserById(Long id);
    void saveUser(User user);
    User updateUser(Long id, User user);
    void deleteUser(Long id);
    List<User> getAllUsers();
}
